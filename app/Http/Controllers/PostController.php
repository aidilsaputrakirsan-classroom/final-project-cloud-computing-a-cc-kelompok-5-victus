<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;

class PostController extends Controller
{
    // For now allow CRUD without auth (auth will be added later).
    public function __construct()
    {
        // require authentication for create/store/edit/update/destroy actions
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        // Show all posts (published and drafts) in the admin table view.
        // Support column sorting via query params: sort and direction.
        $allowedSorts = ['id', 'title', 'category', 'status', 'author', 'published'];
        $sort = $request->get('sort');
        $direction = strtolower($request->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';

        $query = Post::with('category', 'user');

        if (in_array($sort, $allowedSorts, true)) {
            switch ($sort) {
                case 'id':
                    $query = $query->orderBy('id', $direction);
                    break;
                case 'title':
                    $query = $query->orderBy('title', $direction);
                    break;
                case 'category':
                    // Order by related category name (use subquery to avoid join)
                    $query = $query->orderBy(
                        Category::select('name')->whereColumn('categories.id', 'posts.category_id'),
                        $direction
                    );
                    break;
                case 'status':
                    $query = $query->orderBy('status', $direction);
                    break;
                case 'author':
                    // Order by related user's name
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
            // default ordering: by id ascending (1,2,3...)
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
            'categories' => \App\Models\Category::all(),
            'tags' => Tag::all() // Kirim data tags ke view
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required',
            'tags' => 'array', // Validasi input tags harus array
        ]);

        // ... proses upload image ...
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        // Slug logic...

        $post = Post::create($validatedData);

        // ATTACH TAGS YANG DIPILIH
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    public function edit(Post $post)
    {
        $categories = Category::where('is_active', true)->get();
        return view('posts.edit', compact('post', 'categories'));
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

        // handle featured image replacement
        if ($request->hasFile('featured_image')) {
            // delete old file if exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $path = $request->file('featured_image')->store('featured_images', 'public');
            $data['featured_image'] = $path;
        }

        $post->update($data);

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
