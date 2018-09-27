<?php

namespace App\Http\DataProviders\User;


use App\Http\DataProviders\AbstractDataProvider;
use App\Http\Filters\UserFilter;
use App\Tag;
use App\User;

class IndexDataProvider extends AbstractDataProvider
{
    private $filter;

    public function __construct(UserFilter $filter)
    {
        $this->filter = $filter;
    }

    public function getData()
    {
        return [
            //
            ];

    }
}