<?php

namespace App\Http\DataProviders\Chat;


use App\Group;
use App\Http\DataProviders\AbstractDataProvider;
use App\Http\Filters\UserFilter;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;

class IndexDataProvider extends AbstractDataProvider
{

    public function getData()
    {
        return User::where('id', '!=', Auth::id())
            ->latest()
            ->get();

    }

    public function getChat()
    {

    }

    public function getGroup()
    {
        return User::find(Auth::id())->groups()->get();
    }
}