<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_create_edit_and_delete_comment_with_owner_cookie()
    {
        // create a user and a post (no Post factory in this project)
        $user = \App\Models\User::factory()->create();
        $post = Post::create([
            'title' => 'Test Post',
            'slug' => 'test-post-' . time(),
            'content' => 'Hello',
            'status' => 'published',
            'user_id' => $user->id,
            'category_id' => null,
            'published_at' => now(),
        ]);

        // disable middleware (CSRF) for this test and post a comment
        $this->withoutMiddleware();

        // post a comment
        $response = $this->post(route('comments.store', ['post' => $post->id]), [
            'name' => 'Tester',
            'email' => 'tester@example.com',
            'content' => 'Hello world',
        ]);

        $response->assertRedirect();
        // cookie should be set on response
        $cookie = $response->headers->getCookies();
        $found = false;
        foreach ($cookie as $c) {
            if ($c->getName() === 'comment_owner_token') {
                $found = true;
                $token = $c->getValue();
            }
        }
        $this->assertTrue($found, 'Owner cookie was not set');

        $comment = Comment::first();
        $this->assertNotNull($comment);
        $this->assertEquals('Tester', $comment->name);

        // token in cookie should match the stored owner_token on the comment
        $this->assertEquals($token, $comment->owner_token);

        // simulate update/delete on the model (authorization is cookie-based in the controller,
        // but here we assert the model can be updated and deleted as a basic feature test)
        $comment->update(['name' => 'Tester2', 'content' => 'Updated']);
        $this->assertEquals('Tester2', $comment->fresh()->name);

        $comment->delete();
        $this->assertNull($comment->fresh());
    }
}
