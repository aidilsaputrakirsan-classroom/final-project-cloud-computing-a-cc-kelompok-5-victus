<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class LandingBlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with(['user', 'category']);

        $activeCategory = null;
        $activeCategoryName = null;

        if ($request->filled('category')) {
            $slug = $request->get('category');

            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });

            $activeCategory = $slug;
            $activeCategoryName = Category::where('slug', $slug)->value('name');
        }

        $activeTag = null;
        $activeTagName = null;

        if ($request->filled('tag')) {
            $tagSlug = $request->get('tag');

            // Find tag id by slug then filter posts whose JSON `tags` contains that id
            $tagId = Tag::where('slug', $tagSlug)->value('id');
            if ($tagId) {
                $query->whereJsonContains('tags', $tagId);
            }

            $activeTag = $tagSlug;
            $activeTagName = Tag::where('slug', $tagSlug)->value('name');
        }

        $posts = $query->orderByDesc('published_at')
            ->paginate(9)
            ->appends($request->except('page'));

        $categories = Category::withCount([
            'posts' => function ($q) {
                $q->whereNotNull('published_at');
            }
        ])
            ->orderByDesc('posts_count')
            ->take(3)
            ->get();

        // Build tag list with post counts using JSON `tags` on posts
        $tags = Tag::all()->map(function ($tag) {
            $tag->posts_count = Post::whereJsonContains('tags', $tag->id)
                ->whereNotNull('published_at')
                ->count();
            return $tag;
        })->filter(function ($tag) {
            return $tag->posts_count > 0;
        })->sortByDesc('posts_count')
            ->take(10)
            ->values();

        return view('landing.blog', [
            'posts' => $posts,
            'activeCategory' => $activeCategory,
            'activeCategoryName' => $activeCategoryName,
            'activeTag' => $activeTag,
            'activeTagName' => $activeTagName,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function show($slug)
    {

        $post = Post::where('slug', $slug)
            ->published()
            ->with([
                'user',
                'category',
                'comments' => function ($q) {
                    $q->orderByDesc('is_admin')->latest();
                },
                'comments.user'
            ])
            ->firstOrFail();

        $topCategories = Category::withCount([
            'posts' => function ($q) {
                $q->whereNotNull('published_at');
            }
        ])
            ->orderByDesc('posts_count')
            ->take(3)
            ->get();

        // Build tag list with post counts using JSON `tags` on posts
        $tags = Tag::all()->map(function ($tag) {
            $tag->posts_count = Post::whereJsonContains('tags', $tag->id)
                ->whereNotNull('published_at')
                ->count();
            return $tag;
        })->filter(function ($tag) {
            return $tag->posts_count > 0;
        })->sortByDesc('posts_count')
            ->take(10)
            ->values();

        return view('landing.blog-detail', [
            'post' => $post,
            'topCategories' => $topCategories,
            'tags' => $tags,
        ]);
    }
}