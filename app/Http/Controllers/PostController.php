<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $allowedSorts = ['id', 'title', 'category', 'status', 'author', 'published'];
        $sort = $request->get('sort');
        $direction = strtolower($request->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';

        $query = Post::with(['category', 'user', 'tags']);

        if (in_array($sort, $allowedSorts, true)) {
            switch ($sort) {
                case 'id':
                case 'title':
                case 'status':
                    $query = $query->orderBy($sort, $direction);
                    break;
                case 'category':
                    $query = $query->orderBy(
                        Category::select('name')->whereColumn('categories.id', 'posts.category_id'),
                        $direction
                    );
                    break;
                case 'author':
                    $query = $query->orderBy(
                        User::select('name')->whereColumn('users.id', 'posts.user_id'),
                        $direction
                    );
                    break;
                case 'published':
                    $query = $query->orderBy('published_at', $direction)->orderBy('created_at', $direction);
                    break;
            }
        } else {
            $query = $query->orderBy('id', 'asc');
        }

        $posts = $query->paginate(10)->appends($request->except('page'));

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::where('is_active', true)->get(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'array',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = $this->uniqueSlug($data['title']);
        }

        $data['user_id'] = Auth::id() ?? User::first()->id;

        if ($data['status'] === 'published') {
            $data['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('featured_images', 'public');
            $data['featured_image'] = $path;
        }

        $post = Post::create($data);

        // 🔥 Tambahkan tags
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post created');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::where('is_active', true)->get(),
            'tags' => Tag::all(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'array',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = $this->uniqueSlug($data['title'], $post->id);
        }

        if ($data['status'] === 'published' && !$post->published_at) {
            $data['published_at'] = now();
        }

        if ($data['status'] !== 'published') {
            $data['published_at'] = null;
        }

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $path = $request->file('featured_image')->store('featured_images', 'public');
            $data['featured_image'] = $path;
        }

        $post->update($data);

        // 🔥 Update tags (sync)
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted');
    }

    protected function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Post::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
