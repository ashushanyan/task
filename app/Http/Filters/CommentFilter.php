<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;

class CommentFilter extends AbstractFilter
{
    public function __construct(Request $request)
    {
        $this->setRequest($request);
    }

    public function rules(): array
    {
        return [
            'user_id'        => $this->params('user_id', 'where'),
            'post_title'     => $this->relationFilter('post', $this->searchParams('title')),
            'post_user_id'   => $this->relationFilter('post', $this->searchParams('user_id')),
            'comment'        => $this->searchParams('body')
        ];
    }
}