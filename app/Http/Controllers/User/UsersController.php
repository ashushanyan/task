<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\User\IndexDataProvider;
use App\Http\Requests\User\IndexRequest;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
