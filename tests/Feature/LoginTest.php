<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    public function test_get_login_view_with_guest_user(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    public function test_redirect_from_login_view_when_auth_user(): void
    {
        $response = $this
            ->actingAs(User::factory()->create()->first())
            ->get(route('login'));

        $response->assertStatus(302);
    }

}
