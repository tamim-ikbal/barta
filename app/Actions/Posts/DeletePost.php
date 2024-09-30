<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Illuminate\Contracts\Auth\Authenticatable;

class DeletePost
{
    public function handle(Authenticatable $user, Post $post): void
    {
        $post->delete();
    }
}
