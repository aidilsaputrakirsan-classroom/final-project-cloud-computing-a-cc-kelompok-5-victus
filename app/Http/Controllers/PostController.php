<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
        // Ambil semua kategori & user untuk dropdown filter
        $categories = Category::all();
        $authors = User::all();

        // Query dasar
        $query = Post::with('category', 'user');

        // Terapkan filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('author_id')) {
            $query->where('user_id', $request->author_id);
        }

        // Urutkan
        $posts = $query
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->appends($request->query()); // biar pagination tetap bawa filter

        return view('posts.index', compact('posts', 'categories', 'authors'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('posts.create', compact('categories'));
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

        return redirect()->route('posts.show', $post)->with('success', 'Post created');
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

        if ($request->hasFile('featured_image')) {
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
