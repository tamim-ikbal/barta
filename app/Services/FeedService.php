<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class FeedService
{
    public function getFeed(): LengthAwarePaginator
    {
        return Post::query()
            ->with([
                'author' => fn($query) => $query->select('id', 'name','username')
            ])
            ->published()
            ->latest()
            ->paginate(20);
    }
}
