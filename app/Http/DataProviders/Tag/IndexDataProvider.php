<?php

namespace App\Http\DataProviders\Tag;


use App\Http\DataProviders\AbstractDataProvider;
use App\Http\Filters\TagFilter;
use App\Tag;

class IndexDataProvider extends AbstractDataProvider
{
    private $filter;

    public function __construct(TagFilter $filter)
    {
        $this->filter = $filter;
    }

    public function getData()
    {
//        return Tag::with('user.posts.comments')
//                ->latest()
//                ->get();

    }
}