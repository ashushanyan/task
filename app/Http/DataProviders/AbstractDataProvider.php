<?php

namespace App\Http\DataProviders;


use Illuminate\Database\Eloquent\Collection;

abstract class AbstractDataProvider
{
    abstract public function getData();
}