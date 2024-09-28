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

    public function store(PostRequest $request, CreatePost $action):RedirectResponse
    {
        try {
            $action->handle($request->user(), $request->validated());

            return to_route('home')->success(__('Post Created!'));
        } catch (Exception $exception) {
            return back()->error();
        }
    }

    public function show(Post $post): View
    {
        $post->with([
            'author' => fn($query) => $query->select('id', 'name', 'username')
        ]);

        (new PostService())->incrementViews($post);

        return view('posts.show', compact('post'));
    }

    public function update(PostRequest $request, Post $post, UpdatePost $action)
    {
        try {
            $action->handle($request->user(), $post, $request->validated());

            return to_route('home')->success(__('Post Updated!'));
        } catch (Exception $exception) {
            return back()->error();
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
