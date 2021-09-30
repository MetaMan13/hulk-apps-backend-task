<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Dashboard\Post\StoreRequest;
use App\Http\Requests\Dashboard\Post\DestroyRequest;
use App\Http\Requests\Dashboard\Post\EditRequest;
use App\Http\Requests\Dashboard\Post\UpdateRequest;
use App\Http\Requests\Dashboard\Post\ShowRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')
            ->where('user_id', auth()->user()->id)
            ->paginate(2);

        return view('dashboard.post.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('dashboard.post.create');
    }

    public function store(StoreRequest $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        Post::create($request->all());

        return redirect()->route('dashboard.post.index');
    }

    public function show(ShowRequest $request, Post $post)
    {
        return view('dashboard.post.show', [
            'post' => $post->load('comments.user')
        ]);
    }

    public function edit(EditRequest $request, Post $post)
    {
        return view('dashboard.post.edit', [
            'post' => $post
        ]);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('dashboard.post.show', ['post' => $post]);
    }

    public function destroy(DestroyRequest $request, Post $post)
    {
        $postComments = $post->loadCount('comments');

        if($postComments->comments_count > 0)
        {
            return redirect()->back()->with('post_delete_error', 'Sorry, unable to delete a post that has comments');
        }

        $post->delete();

        return redirect()->route('dashboard.post.index');
    }
}
