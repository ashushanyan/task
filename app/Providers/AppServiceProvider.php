<?php

namespace App\Providers;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function register()
    {
        Builder::macro('filterUsing', function (AbstractFilter $filter, string $method = 'handle', ...$args) {
            return $filter->{$method}($this, ...$args);
        });
    }
}
