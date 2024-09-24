<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_profile_view_with_authenticate_user(): void
    {
        $user = User::factory(1)->create()->first();
        $this->actingAs($user)
             ->get(route('profile.edit'))
             ->assertOk();
    }

    public function test_update_profile_with_authenticate_user(): void
    {
        $user = User::factory(1)->create()->first();
        $this->actingAs($user)
             ->get(route('profile.edit'))
             ->assertOk();
    }
}
