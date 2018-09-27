<?php

namespace App\Http\DataProviders\Tag;


use App\Http\DataProviders\AbstractDataProvider;
use App\Post;

class CreateDataProvider extends AbstractDataProvider
{
    public function getData()
    {
        return Post::get();
    }
}