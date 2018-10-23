<?php

namespace App\Http\Controllers\Chat;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\DataProviders\Chat\IndexDataProvider;
use App\Http\DataProviders\Chat\ShowDataProvider;
use App\Http\Requests\Chat\IndexRequest;
use App\Http\Requests\Chat\StoreRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
        return view('chat.index')
            ->with([
                'users'  => $provider->getData(),
                'groups' => $provider->getGroup(),

            ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreRequest $request)
    {
        return redirect()->back()
            ->with(
                'success',
                $request->persist()
            );
    }

    public function show(ShowDataProvider $provider)
    {
        return view('chat.show')
            ->with([
                'auth'          => Auth::user(),
                'userForChat'   => $provider->getUserForChat(),
                'messages'      => $provider->getData()
            ]);
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
