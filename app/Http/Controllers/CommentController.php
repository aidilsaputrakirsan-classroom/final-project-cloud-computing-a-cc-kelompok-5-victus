<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with('user', 'category')->withCount('comments');
        $query->having('comments_count', '>', 0);

        $sort = $request->get('sort', 'comments_count');
        $direction = strtolower($request->get('direction', 'desc')) === 'desc' ? 'desc' : 'asc';
        $allowed = ['id', 'title', 'comments_count', 'category'];

        if (in_array($sort, $allowed)) {
            if ($sort === 'category') {
                $query = $query->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
                    ->select('posts.*')
                    ->orderBy('categories.name', $direction);
            } else {
                $query = $query->orderBy($sort, $direction);
            }
        } else {
            $query = $query->orderByDesc('comments_count');
        }

        $posts = $query->get();
        return view('comments.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->get();
        return view('comments.show', compact('post', 'comments'));
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
            'name'    => 'nullable|string|max:255',
            'email'   => 'nullable|email|max:255',
        ]);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->content = $request->input('content');
        $comment->owner_token = (string) Str::uuid();

        if (Auth::check()) {
            $user = Auth::user();
            $comment->name = $user->name;
            $comment->email = $user->email;
            $comment->is_admin = false;
        } else {
            $comment->name = $request->name ?? 'Guest';
            $comment->email = $request->email;
            $comment->is_admin = false;
        }        // 4. Data Teknis
        $comment->ip_address = $request->ip();
        $comment->user_agent = $request->userAgent();

        $comment->save();

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
    public function edit(Comment $comment)
    {
        if (!$comment->is_admin) {
            abort(403);
        }
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        if (!$comment->is_admin) {
            abort(403);
        }
        $data = $request->validate([
            'content' => 'required|string',
        ]);
        $comment->content = $data['content'];
        $comment->save();

        return redirect()->route('admin.comments.show', $comment->post_id)->with('success', 'Comment updated.');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::check() && $comment->user_id == Auth::id()) {
            $comment->delete();
            return back()->with('success', 'Komentar berhasil dihapus.');
        }

        return back()->with('error', 'Anda tidak berhak menghapus komentar ini.');
    }
}
