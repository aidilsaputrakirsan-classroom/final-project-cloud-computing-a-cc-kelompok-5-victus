<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingBlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()
            ->with('user', 'category')
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('landing.blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->published()->with('user', 'category')->firstOrFail();

        return view('landing.blog-detail', compact('post'));
    }
}
