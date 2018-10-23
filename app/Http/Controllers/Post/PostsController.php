<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\Post\IndexDataProvider;
use App\Http\DataProviders\Post\ShowDataProvider;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\DestroyRequest;
use App\Http\Requests\Post\IndexRequest;
use App\Http\Requests\Post\ShowRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class PostsController extends Controller
{
    public function index(IndexRequest $request, IndexDataProvider $provider, Tag $tag): View
    {
//        dd($tag->all()[0]->posts());
        return view('posts.index')
            ->with([
                'posts'    => $provider->getData(),
                'request'  => $request,
                'allTags'  => $tag
            ]);
    }

    public function create(CreateRequest $request, ShowDataProvider $provider): View
    {
        return view('posts.create')
            ->with(
                'allTags', $provider->getData()
            );
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        return redirect('/posts')
            ->with(
                'success',
                $request->persist()->getMessage()
            );
    }

    public function show(ShowRequest $request, Post $post, ShowDataProvider $provider): View
    {
        return view('/posts.show')
            ->with([
                'post'    => $post,
                'allTags' => $provider->getData()

            ]);
    }

    public function edit(Post $post, Tag $tag): View
    {
        return view('posts.edit')
            ->with([
                'post'   => $post,
                'tags'   => $tag
            ]);
    }

    public function update(UpdateRequest $request, Post $post): RedirectResponse
    {
//        dd($post);
        return redirect('/posts')
            ->with(
                'success',
                $request->persist()->getMessage()
            );

    }

    public function destroy(DestroyRequest $request, Post $post): RedirectResponse
    {
        return redirect('/posts')
            ->with(
                'success',
                $request->persist()->getMessage()
            );
    }
}
