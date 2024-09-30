<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::query()->pluck('id');
        return [
            'user_id' => $users->random(),
            'content' => fake()->sentences(3,true),
            'view_count' => fake()->randomNumber(3),
            'comment_count' => fake()->randomNumber(2),
            'status' => fake()->randomElement(PostStatus::class)->value,
            'created_at' => now()->subDays(rand(0, 365)),
        ];
    }
}
