<?php

namespace App\Policies;


use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function destroy(User $authUser, Comment $comment): bool
    {
        return $authUser->id == $comment->user_id;
    }
}