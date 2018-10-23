<?php

namespace App\Http\Controllers\GroupMessage;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupMessage\StoreRequest;
use Illuminate\Http\Request;

class GroupMessagesController extends Controller
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
        return redirect()->back()
            ->with(
                'success',
                $request->persist()
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
