<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag; // Jangan lupa import Model Tag
use Illuminate\Http\Request;

class LandingBlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with('category', 'user', 'tags');

        // 1. Filter Category
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // 2. Filter Tag
        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        // 3. Search
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        $posts = $query->latest('published_at')->paginate(6)->withQueryString();

        // PERBAIKAN: Gunakan 'has' untuk memfilter category yang punya post
        $categories = Category::withCount(['posts' => function ($q) {
            $q->whereNotNull('published_at');
        }])->has('posts')->get(); // 'has' otomatis cek count > 0

        // PERBAIKAN: Gunakan 'has' untuk memfilter tag yang punya post
        $tags = Tag::withCount(['posts' => function ($q) {
            $q->whereNotNull('published_at');
        }])->has('posts')->get();

        return view('landing.blog', [
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function show($slug)
    {
        $post = Post::published()
            ->with(['category', 'user', 'comments.user', 'tags'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Sidebar Categories
        $topCategories = Category::withCount(['posts' => function ($q) {
            $q->whereNotNull('published_at');
        }])->has('posts')->orderByDesc('posts_count')->take(5)->get();

        // Sidebar Tags (PERBAIKAN)
        $allTags = Tag::withCount(['posts' => function ($q) {
            $q->whereNotNull('published_at');
        }])->has('posts')->get();

        return view('landing.blog-detail', [
            'post' => $post,
            'topCategories' => $topCategories,
            'tags' => $allTags
        ]);
    }
}
