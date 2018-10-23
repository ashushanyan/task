<?php

namespace App\Http\DataProviders\Chat;


use App\Http\DataProviders\AbstractDataProvider;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowDataProvider extends AbstractDataProvider
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getData()
    {
        $user_id = explode('/',$this->request->path())[1];
        $message = Message::with('user')
            ->where(function($query) use ($user_id) {
                return $query->where('from_id', Auth::id())
                    ->where('to_id', $user_id);
            })
            ->orWhere(function($query) use ($user_id) {
                return $query->where('from_id', $user_id)
                    ->where('to_id', Auth::id());
            })
            ->get();


        return $message ;
    }

    public function getUserForChat()
    {
        $user_id = explode('/',$this->request->path())[1];
        return User::find($user_id);
    }



//    public function getAuthMessages()
//    {
//        return $this->getData()->groupBy('from_id')->get(Auth::id());
//    }
//
//    public function getGuestMessages()
//    {
//        return $this->getData()->groupBy('from_id')->get($this->request['check_user_ids'][0]);

//    }


//    public function filterByTags()
//    {
//        return function ($query) {
//            if(empty($this->request['tag_ids'])) {
//                return null;
//            } else {
//                $query->whereIn('to_id', $this->request['check_user_ids']);
//            }
//        };
//    }
}