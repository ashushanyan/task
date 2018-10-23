<?php

namespace App\Http\Requests\GroupChat;


use App\Group;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'group_name' => 'required|string|max:20',
            'users_ids'  => 'required|array|between:2,20',
        ];
    }

    public function persist(): self
    {
        $allUsersIdsInChat = $this->users_ids;
        array_push($allUsersIdsInChat, Auth::id());


        $group = Group::create($this->getProcessedData());
        $group->users()->attach($allUsersIdsInChat);


        return $this;
    }
//
    public function getProcessedData(): array
    {
        return [
            'name'     => $this->group_name,
        ];
    }

    public function getChatName(): string
    {
        return Auth::user()->name. ' ' . User::find($this->users_ids)->implode('name', ' ');
    }
//
    public function getMessage(): string
    {
        return "Group chat created";
    }


}