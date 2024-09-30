<?php

namespace Tests\Feature;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_added_new_post_successfully(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->assertDatabaseCount('posts', 0);

        $response = $this->post('/posts', [
            'barta' => 'Test Content',
        ]);

        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirectToRoute('home');

        $this->assertDatabaseCount('posts', 1);

        $this->assertEquals('Test Content', $user->posts()->first()->content);
    }

    public function test_can_visit_post_single_page(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $createdPost = Post::factory()->create([
            'user_id' => $user->id,
            'content' => 'Test Content',
            'status' => PostStatus::PUBLISHED
        ]);

        $response = $this->get(route('posts.show', $createdPost->id));

        $response->assertOk();
        $response->assertSee('Test Content');

        $response->assertViewIs('posts.show');
        $response->assertViewHas('post', function (Post $post) use ($createdPost) {
            return $createdPost->id === $post->id;
        });

        $this->assertEquals('Test Content', $createdPost->content);
        $this->assertEquals(PostStatus::PUBLISHED, $createdPost->status);
    }

    public function test_can_see_only_published_post_on_single_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        //Published Post
        $publishedPost = Post::factory()->create([
            'user_id' => $user->id,
            'content' => 'Test Content',
            'status' => PostStatus::PUBLISHED
        ]);

        $response = $this->get(route('posts.show', $publishedPost->id));
        $response->assertOk();
        $response->assertSee('Test Content');
        $response->assertViewIs('posts.show');
        $response->assertViewHas('post', function (Post $post) use ($publishedPost) {
            return $post->id === $publishedPost->id && $post->status === PostStatus::PUBLISHED;
        });
        $this->assertEquals($user->id, $publishedPost->user_id);


        //Others Status
        $pendingPost = Post::factory()->create([
            'user_id' => $user->id,
            'content' => 'Test Content',
            'status' => PostStatus::PENDING //any other status
        ]);
        $response = $this->get(route('posts.show', $pendingPost->id));
        $response->assertNotFound();

    }

    public function test_post_not_found()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get(route('posts.show', 'not-found'));

        $response->assertNotFound();
    }

    public function test_can_edit_page_render_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $newPost = Post::factory()->create([
            'user_id' => $user->id,
            'content' => 'Test Content',
        ]);
        $response = $this->get(route('posts.edit', $newPost->id));
        $response->assertOk();
        $response->assertSee('Test Content');
        $response->assertViewIs('posts.edit');
        $response->assertViewHas('post', function (Post $post) use ($newPost) {
            return $post->id === $newPost->id;
        });
    }

    public function test_user_can_see_the_edit_post_page_of_their_own_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $ownPost = Post::factory()->create([
            'user_id' => $user->id,
            'content' => 'Test Content'
        ]);
        $response = $this->get(route('posts.edit', $ownPost->id));
        $response->assertOk();
        $response->assertSee('Test Content');
        $response->assertViewIs('posts.edit');
        $response->assertViewHas('post', function (Post $post) use ($ownPost) {
            return $post->id === $ownPost->id && $post->user_id === $ownPost->user_id;
        });

        //
        $otherUsersPost = Post::factory()->create([
            'user_id' => User::factory()->create()->id,
            'content' => 'Test Content'
        ]);
        $response = $this->get(route('posts.edit', $otherUsersPost->id));
        $response->assertNotFound();
    }

    public function test_can_user_update_their_own_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
            'content' => 'Test Content',
            'status' => PostStatus::DRAFT
        ]);

        $response = $this->put(route('posts.update', $post->id), [
            'barta' => 'Test Content Updated!'
        ]);

        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect(route('posts.edit', $post->id));

        $post->refresh();

        $this->assertEquals('Test Content Updated!', $post->content);
        $this->assertEquals(PostStatus::DRAFT, $post->status);

        //
        $otherUserPost = Post::factory()->create([
            'user_id' => User::factory()->create()->id,
            'content' => 'Test Content'
        ]);

        $response = $this->put(route('posts.update', $otherUserPost->id), [
            'barta' => 'Test Content Updated!'
        ]);
        $response->assertNotFound();
    }

    public function test_can_user_delete_their_own_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create([
            'user_id' => $user->id,
            'content' => 'Test Content',
            'status' => PostStatus::DRAFT
        ]);

        $response = $this->delete(route('posts.destroy', $post->id));
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect(route('home'));

        $this->assertNull($post->fresh());
        $this->equalTo(0, $user->posts()->count());
        $this->assertDatabaseCount('posts', 0);

        $otherUserPost = Post::factory()->create([
            'user_id' => User::factory()->create()->id,
            'content' => 'Test Content'
        ]);
        $response = $this->delete(route('posts.destroy', $otherUserPost->id));
        $response->assertForbidden();

    }

}
