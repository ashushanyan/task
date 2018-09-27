<?php

namespace App\Http\DataProviders\Post;


use App\Http\DataProviders\AbstractDataProvider;
use App\Http\Filters\PostFilter;
use App\Post;
use App\Tag;

class IndexDataProvider extends AbstractDataProvider
{
    private $filter;

    public function __construct(PostFilter $filter)
    {
        $this->filter = $filter;
    }

    public function getData()
    {
        return Post::with('user', 'tags')
                ->filterUsing($this->filter)
                ->latest()
                ->get();
    }

}