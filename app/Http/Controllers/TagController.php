<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = \App\Models\Tag::withCount('posts')->latest()->paginate(10);

        return view('tags.index', [
            'tags' => $tags
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
