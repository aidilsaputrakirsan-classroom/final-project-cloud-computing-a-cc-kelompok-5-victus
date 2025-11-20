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
            'tags' => 'array',
            'status' => 'required|in:draft,published,archived',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = Auth::id();

        $validatedData['content'] = $request->body;
        unset($validatedData['body']);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validatedData['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

        if ($request->status === 'published') {
            $validatedData['published_at'] = now();
        }

        $post = Post::create($validatedData);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'New post has been added!');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required',
            'tags' => 'array',
            'status' => 'required|in:draft,published,archived',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                \Illuminate\Support\Facades\Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = Auth::id();

        $validatedData['content'] = $request->body;
        unset($validatedData['body']);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->status === 'published') {
            if (!$post->published_at) {
                $validatedData['published_at'] = now();
            }
        } else {
            $validatedData['published_at'] = null;
        }

        $post->update($validatedData);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('posts.index')->with('success', 'Post has been updated!');
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
