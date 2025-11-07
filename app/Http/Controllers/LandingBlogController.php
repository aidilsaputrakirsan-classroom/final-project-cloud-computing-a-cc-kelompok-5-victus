<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingBlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with('user', 'category');

        $activeCategory = null;
        $activeCategoryName = null;
        if ($request->filled('category')) {
            $slug = $request->get('category');
            // filter by category slug
            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
            $activeCategory = $slug;
            // resolve name for display
            $activeCategoryName = \App\Models\Category::where('slug', $slug)->value('name');
        }

        $posts = $query->orderByDesc('published_at')->paginate(9)->appends($request->except('page'));

        return view('landing.blog', compact('posts', 'activeCategory', 'activeCategoryName'));
    }

    public function show($slug)
    {
        // eager load comments (latest first) so the view can render them
        $post = Post::where('slug', $slug)
            ->published()
            ->with([
                'user',
                'category',
                // order comments so admin comments appear first, then by latest
                'comments' => function ($q) {
                    $q->orderByDesc('is_admin')->latest();
                }
            ])
            ->firstOrFail();

        // top 3 categories by published posts count
        $topCategories = \App\Models\Category::withCount([
            'posts' => function ($q) {
                $q->whereNotNull('published_at');
            }
        ])->orderByDesc('posts_count')->take(3)->get();

        return view('landing.blog-detail', compact('post', 'topCategories'));
    }
}
