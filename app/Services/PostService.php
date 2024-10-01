<?php

namespace App\Services;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
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

    public static function findOrFail(string $id, array $with = [], PostStatus|null $status = null): Post
    {
        return Post::query()
            ->when(count($with) > 0, function ($query) use ($with) {
                $query->with($with);
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->published()
            ->findOrFail($id);
    }

    public static function findPostByUser(string $postId, int $userId, array $with = []): Post
    {
        return Post::query()
            ->when(count($with) > 0, function ($query) use ($with) {
                $query->with($with);
            })
            ->where('user_id', $userId)
            ->findOrFail($postId);
    }
}
