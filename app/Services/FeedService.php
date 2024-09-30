<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Http\Request;

class FeedService
{
    public function getFeed(): CursorPaginator
    {
        return Post::query()
            ->with([
                'author' => fn($query) => $query->select('id', 'name', 'username')
            ])
            ->published()
            ->latest()
            ->cursorPaginate(perPage: 20, cursorName: 'paged');
    }
}
