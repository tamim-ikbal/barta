<?php

namespace App\Http\Controllers;

use App\Actions\Posts\CreatePost;
use App\Actions\Posts\DeletePost;
use App\Actions\Posts\UpdatePost;
use App\Http\Requests\Posts\PostDeleteRequest;
use App\Http\Requests\Posts\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    public function store(PostRequest $request, CreatePost $action): RedirectResponse
    {
        try {
            $action->handle($request->user(), $request->validated());

            return to_route('home')->success(__('Post Created!'));
        } catch (Exception $exception) {
            return back()->error();
        }
    }

    public function show(string $id): View
    {
        $post = Post::query()
            ->with([
                'author' => fn($query) => $query->select('id', 'name', 'username')
            ])
            ->published()
            ->findOrFail($id);

        (new PostService())->incrementViews($post);

        return view('posts.show', compact('post'));
    }

    public function edit(string $id): View
    {
        $post = Post::query()
            ->where('user_id', auth()->id())
            ->findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, string $id, UpdatePost $action)
    {
        $post = Post::query()
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        try {
            $action->handle($request->user(), $post, $request->validated());

            return to_route('posts.edit', $post->id)->success(__('Post Updated!'));
        } catch (Exception $exception) {
            return to_route('posts.edit', $post->id)->error();
        }
    }

    public function destroy(PostDeleteRequest $request, Post $post, DeletePost $action): RedirectResponse
    {
        try {
            $action->handle($request->user(), $post);

            return to_route('home')->success(__('Post Deleted!'));
        } catch (Exception $exception) {
            return back()->error();
        }
    }
}
