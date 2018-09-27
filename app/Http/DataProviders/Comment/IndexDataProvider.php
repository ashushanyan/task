<?php

namespace App\Http\DataProviders\Comment;


use App\Comment;
use App\Http\DataProviders\AbstractDataProvider;
use App\Http\Filters\CommentFilter;

class IndexDataProvider extends AbstractDataProvider
{
    private $filter;

    public function __construct(CommentFilter $filter)
    {
        $this->filter = $filter;
    }

    public function getData()
    {
        return Comment::filterUsing($this->filter)
            ->with('post', 'user')
            ->latest()
            ->get();
    }
}