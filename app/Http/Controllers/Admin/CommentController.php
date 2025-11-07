<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Index: list posts that have comments
    public function index(Request $request)
    {
        $query = Post::published()->with('user', 'category')->withCount('comments');

        // only include posts that have comments
        $query->having('comments_count', '>', 0);

        // sorting
        $sort = $request->get('sort', 'comments_count');
        $direction = strtolower($request->get('direction', 'desc')) === 'desc' ? 'desc' : 'asc';

        $allowed = ['id', 'title', 'comments_count', 'category'];
        if (in_array($sort, $allowed)) {
            if ($sort === 'category') {
                // join categories for ordering by category name
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

    // Show comments for a specific post
    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->get();
        return view('comments.show', compact('post', 'comments'));
    }

    // Show create form for admin comment for a post
    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    // Store admin comment (label as admin)
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $user = $request->user();

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->name = $user ? $user->name : 'Admin';
        $comment->email = $user ? $user->email : null;
        $comment->content = $data['content'];
        // owner_token is non-nullable in the schema — give admin comments a random token
        $comment->owner_token = (string) Str::uuid(); // non-null placeholder for admin
        $comment->is_admin = true;
        $comment->ip_address = $request->ip();
        $comment->user_agent = $request->userAgent();
        $comment->save();

        return redirect()->route('admin.comments.show', $post)->with('success', 'Comment created.');
    }

    // Edit only allowed for admin-created comments (name === Admin or belongs to current user)
    public function edit(Comment $comment)
    {
        // Only allow editing comments created by admin (name matches 'Admin' or current user)
        // Only allow editing comments that were created by admin
        if (!$comment->is_admin) {
            abort(403);
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        // Only allow updating comments that were created by admin
        if (!$comment->is_admin) {
            abort(403);
        }

        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->content = $data['content'];
        $comment->save();

        // Redirect back to post comments management
        return redirect()->route('admin.comments.show', $comment->post_id)->with('success', 'Comment updated.');
    }

    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;
        $comment->delete();
        return redirect()->route('admin.comments.show', $postId)->with('success', 'Comment deleted.');
    }
}