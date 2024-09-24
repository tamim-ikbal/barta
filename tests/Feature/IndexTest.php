<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $user     = User::factory(1)->create()->first();
        $response = $this
            ->actingAs($user)
            ->get('/');

        $response->assertStatus(200);
    }
}
