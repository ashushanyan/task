<?php

namespace App\Http\Filters;

use App\Post;
use Illuminate\Http\Request;

class UserFilter extends AbstractFilter
{
    public function __construct(Request $request)
    {
        $this->setRequest($request);
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
