<?php

namespace App\Http\Controllers\Comment;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\DataProviders\Comment\IndexDataProvider;
use App\Http\Requests\Comment\DestroyRequest;
use App\Http\Requests\Comment\EditRequest;
use App\Http\Requests\Comment\IndexRequest;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Transformers\CommentTransformer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentsController extends Controller
{
    public function index(IndexRequest $request, IndexDataProvider $provider): View
    {
        return view('comments.index')
            ->with(
                'comments',
                CommentTransformer::collection($provider->getData(), 'indexTransform')
            );
    }

    public function create()
    {
        //
    }

    public function store(StoreRequest $request, Comment $comment): RedirectResponse
    {
        return redirect()
            ->back()
            ->with(
                'success',
                $request->persist()->getMessage()
            );
    }

    public function show($id)
    {
        //
    }

    public function edit(EditRequest $request, Comment $comment): View
    {
        return view('/comments.edit')
            ->with(
                'comment',
            CommentTransformer::simple($comment)
            );
    }

    public function update(UpdateRequest $request, Comment $comment): RedirectResponse
    {
        return redirect('/posts/'.$comment->post_id)
            ->with(
                'success',
                $request->persist()->getMessage()
            );
    }

    public function destroy(DestroyRequest $request, Comment $comment): RedirectResponse
    {
        return redirect()
            ->back()
            ->with(
                'success',
                $request->persist()->getMessage()
            );
    }
}
