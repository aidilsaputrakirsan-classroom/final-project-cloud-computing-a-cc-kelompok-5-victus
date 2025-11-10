<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // ✅ untuk koneksi ke Supabase

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

        $query = Post::with('category', 'user');

        if (in_array($sort, $allowedSorts, true)) {
            switch ($sort) {
                case 'id':
                    $query->orderBy('id', $direction);
                    break;
                case 'title':
                    $query->orderBy('title', $direction);
                    break;
                case 'category':
                    $query->orderBy(
                        Category::select('name')->whereColumn('categories.id', 'posts.category_id'),
                        $direction
                    );
                    break;
                case 'status':
                    $query->orderBy('status', $direction);
                    break;
                case 'author':
                    $query->orderBy(
                        User::select('name')->whereColumn('users.id', 'posts.user_id'),
                        $direction
                    );
                    break;
                case 'published':
                    $query->orderBy('published_at', $direction)->orderBy('created_at', $direction);
                    break;
            }
        } else {
            $query->orderBy('id', 'asc');
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

        // ✅ Upload ke Supabase bucket `upload`
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Upload ke Supabase Storage
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('SUPABASE_SERVICE_KEY'),
                'apikey' => env('SUPABASE_ANON_KEY'),
            ])
                ->attach('file', fopen($file->path(), 'r'), $fileName)
                ->post(env('SUPABASE_URL') . '/storage/v1/object/upload/' . $fileName); // ✅ ubah dari uploads → upload

            // Simpan URL publik ke DB
            $data['featured_image'] = env('SUPABASE_URL') . '/storage/v1/object/public/upload/' . $fileName;
        }

        $post = Post::create($data);

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully!');
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
        } elseif ($data['status'] !== 'published') {
            $data['published_at'] = null;
        }

        // ✅ Upload baru ke Supabase jika ada gambar baru
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('SUPABASE_SERVICE_KEY'),
                'apikey' => env('SUPABASE_ANON_KEY'),
            ])
                ->attach('file', fopen($file->path(), 'r'), $fileName)
                ->post(env('SUPABASE_URL') . '/storage/v1/object/upload/' . $fileName); // ✅ diubah

            $data['featured_image'] = env('SUPABASE_URL') . '/storage/v1/object/public/upload/' . $fileName;
        }

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    protected function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Post::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
