<?php

namespace App\Http\DataProviders\GroupChat;


use App\Group;
use App\GroupMessage;
use App\Http\DataProviders\AbstractDataProvider;
use Illuminate\Http\Request;

class ShowDataProvider extends AbstractDataProvider
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getData()
    {
        return GroupMessage::with('user', 'group.users')
            ->where('group_id', $this->request->groupChat->id)
            ->get();
    }

    public function getGroup()
    {
        return Group::find($this->request->groupChat->id);
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