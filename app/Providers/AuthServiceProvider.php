<?php

namespace App\Providers;

use App\Comment;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use App\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Post::class     => PostPolicy::class,
        Comment::class  => CommentPolicy::class
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
