<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\Tag\CreateDataProvider;
use App\Http\DataProviders\Tag\IndexDataProvider;
use App\Http\Requests\Tag\CreateRequest;
use App\Http\Requests\Tag\IndexRequest;
use App\Http\Requests\Tag\StoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagsController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
//        return view('tags.index')
//            ->with ([
//                'users'     =>  $provider->getData()[0],
//                'allTags'   =>  $provider->getData()
//            ]);
    }

    public function create(CreateRequest $request, CreateDataProvider $provider): View
    {
        return view('tags.create')
                ->with(
                    'allPosts', $provider->getData()
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
