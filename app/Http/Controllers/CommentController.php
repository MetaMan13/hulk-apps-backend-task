<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\DestroyRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(StoreRequest $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);

        Comment::create($request->all());

        return redirect()->route('post.show', ['post' => $request->post_id])->with('comment_created', 'Your comment has been created!');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(UpdateRequest $reqeust)
    {

    }

    public function destroy(DestroyRequest $request, Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('comment_delete', 'Your comment has been deleted!');
    }
}
