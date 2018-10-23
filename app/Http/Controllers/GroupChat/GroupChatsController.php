<?php

namespace App\Http\Controllers\GroupChat;

use App\Group;
use App\GroupMessage;
use App\Http\Controllers\Controller;
use App\Http\DataProviders\Chat\IndexDataProvider;
use App\Http\DataProviders\GroupChat\ShowDataProvider;
use App\Http\Requests\Chat\IndexRequest;
use App\Http\Requests\GroupChat\StoreRequest;
use App\Http\Requests\GroupChat\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupChatsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(StoreRequest $request)
    {
        return redirect('/chat')
            ->with(
                'success',
                $request->persist()->getMessage()
            );
    }

    public function show(ShowDataProvider $provider, Group $groupChat)
    {
        return view('groupChat.show')
            ->with([
                'auth'        => Auth::user(),
                'group'       => $provider->getGroup(),
                'messages'    => $provider->getData()
            ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateRequest $request, Group $groupChat): RedirectResponse
    {
        return redirect()->back()
            ->with(
                'success',
                $request->persist()->getMessage()
            );
    }

    public function destroy($id)
    {
        //
    }
}
