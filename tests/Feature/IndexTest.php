<?php

namespace Tests\Feature;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_index_page_render_successfully_with_feeds_pagination(): void
    {
        $user = User::factory(1)->create()->first();
        $this->actingAs($user);
        $this->assertDatabaseCount('posts', 0);

        $feeds = Post::factory(22)->create([
            'status' => PostStatus::PUBLISHED
        ]);

        $this->assertDatabaseCount('posts', 22);

        $firstPost = $feeds->first();
        $lastPost = $feeds->keys()->last();

        $response = $this->get('/');

        $response->assertOk();
        $response->assertViewIs('index');
        $response->assertViewHas('feeds', function ($feeds) use ($firstPost) {
            return $feeds->contains($firstPost);
        });

        //Pagination
        $response->assertViewHas('feeds', function ($feeds) use ($lastPost) {
            return $feeds->count() === 20;
        });
        $response->assertViewHas('feeds', function ($feeds) use ($lastPost) {
            return $feeds->hasMorePages();
        });
    }
}
