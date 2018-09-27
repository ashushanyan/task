<?php

namespace App\Http\Filters;


use Illuminate\Http\Request;

class PostFilter extends AbstractFilter
{
    public function __construct(Request $request)
    {
        $this->setRequest($request);
    }

    public function rules(): array
    {
        return [
            'search_key'     => $this->searchParams('title','body'),
            'tag_ids'        => $this->relationFilter('tags', $this->searchParams('tag_id'))
        ];
    }
}