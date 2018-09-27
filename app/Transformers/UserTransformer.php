<?php

namespace App\Transformers;


use App\User;
use Illuminate\Database\Eloquent\Model;

class UserTransformer extends Transformer
{
    public function simpleTransform(Model $item): array
    {
        return [
            'id'        => $item->id,
            'name'      => $item->name,
            'email'     => $item->email,
        ];
    }

    public function indexTransform(User $user):    array
    {
        return array_merge($this->simpleTransform($user), [
            'posts' => PostTransformer::collection($user->posts, 'commentTransform')
        ]);
    }
}