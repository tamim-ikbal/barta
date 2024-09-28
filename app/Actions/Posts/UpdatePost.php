<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Illuminate\Contracts\Auth\Authenticatable;

class UpdatePost
{
    public function handle(Authenticatable $user, Post $post, array $data): void
    {
        $post->update([
            'content' => $data['barta'],
        ]);
    }
}
