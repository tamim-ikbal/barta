<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostService
{
    protected string $postViewKeySuffix = 'post-viewed-';

    public function incrementViews(Post $post): void
    {
        if (Session::has($this->generatePostViewKey($post->id))) {
            return;
        }
        $post->increment('view_count', 1);
        Session::put($this->generatePostViewKey($post->id), $post->view_count);
    }

    protected function generatePostViewKey(string $post_id): string
    {
        return $this->postViewKeySuffix.$post_id;
    }
}
