<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class TagController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $sort = request()->get('sort', 'id');
        $direction = strtolower(request()->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';

        // Load all tags and compute posts_count (using JSON tags on posts)
        $tags = Tag::all()->map(function ($tag) {
            $tag->posts_count = Post::whereJsonContains('tags', $tag->id)->count();
            return $tag;
        });

        // Sort collection based on requested column
        if ($sort === 'posts_count') {
            $tags = $direction === 'asc' ? $tags->sortBy('posts_count') : $tags->sortByDesc('posts_count');
        } elseif (in_array($sort, ['id', 'name', 'slug', 'created_at'])) {
            $tags = $direction === 'asc' ? $tags->sortBy($sort) : $tags->sortByDesc($sort);
        } else {
            // default: sort by id
            $tags = $tags->sortBy('id');
        }

        // Manual pagination
        $page = LengthAwarePaginator::resolveCurrentPage();
        $itemsForCurrentPage = $tags->forPage($page, $perPage)->values();
        $paginator = new LengthAwarePaginator($itemsForCurrentPage, $tags->count(), $perPage, $page, [
            'path' => route('admin.tags.index'),
            'query' => request()->except('page'),
        ]);

        return view('tags.index', [
            'tags' => $paginator,
        ]);
    }
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:tags',
        ]);

        $validated['slug'] = Str::slug($request->name);

        Tag::create($validated);

        return redirect()->route('admin.tags.index')->with('success', 'New tag has been added!');
    }
}
