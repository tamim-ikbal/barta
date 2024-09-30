<?php

namespace App\Actions\Posts;

use App\Enums\PostStatus;
use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Contracts\Auth\Authenticatable;

class CreatePost
{
    public function handle(Authenticatable $user, array $data): void
    {
        $post = Post::create([
            'user_id' => $user->id,
            'content' => $data['barta'],
            'status' => PostStatus::PUBLISHED,
        ]);

        event(new PostCreated($post));
    }
}
