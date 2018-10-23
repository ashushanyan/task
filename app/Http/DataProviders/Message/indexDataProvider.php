<?php

namespace App\Http\DataProviders\Message;


use App\Http\DataProviders\AbstractDataProvider;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexDataProvider extends AbstractDataProvider
{
//    public $request;
//
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }
//
//    public function getData()
//    {
//        return Message::with('user')
//            ->where(function($query) {
//                return $query->where('from_id', Auth::id())
//                        ->where('to_id', $this->request['check_user_ids']);
//                })
//            ->orWhere(function($query) {
//                return $query->where('from_id', $this->request['check_user_ids'])
//                    ->where('to_id', Auth::id());
//                })
////            `
//            ->get();
//    }
//
////    public function getAuthMessages()
////    {
////        return $this->getData()->groupBy('from_id')->get(Auth::id());
////    }
////
////    public function getGuestMessages()
////    {
////        return $this->getData()->groupBy('from_id')->get($this->request['check_user_ids'][0]);
////    }
//
//    public function getUsers()
//    {
//        return User::find($this->request['check_user_ids']);
//    }
//
//
////    public function filterByTags()
////    {
////        return function ($query) {
////            if(empty($this->request['tag_ids'])) {
////                return null;
////            } else {
////                $query->whereIn('to_id', $this->request['check_user_ids']);
////            }
////        };
////    }
}