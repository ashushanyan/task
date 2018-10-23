<?php

namespace App\Http\DataProviders\Post;


use Illuminate\Http\Request;
use App\Post;

class IndexDataProvider
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getData()
    {
        return  Post::with('user', 'tags')
                    ->where('title', 'like', '%'.$this->request['search_key'].'%')
                    ->orWhere('body', 'like', '%'.$this->request['search_key'].'%')
                    ->whereHas('tags', $this->filterByTags())
                    ->latest()
                    ->get();
    }

    public function filterByTags() 
    {
        return function ($query) {
                if(empty($this->request['tag_ids'])) {
                    return null;
                } else {
                    $query->whereIn('tag_id', $this->request['tag_ids']);
                }
            };
    }

}
