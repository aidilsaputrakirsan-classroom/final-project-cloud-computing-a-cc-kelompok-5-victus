<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        // PERBAIKAN: 
        // Gunakan has('comments') untuk mengambil post yang punya komentar.
        // Ini menggantikan logic having('comments_count', '>', 0) yang error di Postgres.
        $query = Post::withCount('comments')->has('comments');

        // Logika Sorting
        if ($request->has('sort') && $request->has('direction')) {
            $query->orderBy($request->get('sort'), $request->get('direction'));
        } else {
            // Default sorting
            $query->orderByDesc('comments_count');
        }

        $posts = $query->get();

        return view('comments.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // Ambil komentar terbaru dari post tersebut
        $comments = $post->comments()->with('user')->latest()->get();
        return view('comments.show', compact('post', 'comments'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully');
    }

    // Tambahkan method edit/update jika diperlukan
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate(['content' => 'required']);
        $comment->update(['content' => $request->content()]);
        return redirect()->route('admin.comments.index')->with('success', 'Comment updated');
    }
}
