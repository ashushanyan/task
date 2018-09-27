<?php

namespace App\Http\DataProviders\Post;


use App\Http\DataProviders\AbstractDataProvider;
use App\Post;
use App\Tag;

class ShowDataProvider extends AbstractDataProvider
{
    public function getData()
    {
        return Tag::latest()
            ->get();
    }
}