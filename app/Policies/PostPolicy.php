<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function destroy(User $authUser, Post $post): bool
    {
        return $post->user_id == $authUser->id;
    }
}
