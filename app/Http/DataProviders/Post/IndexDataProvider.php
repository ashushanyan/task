<?php

namespace App\Http\DataProviders\Post;


use App\Http\DataProviders\AbstractDataProvider;
use App\Http\Filters\PostFilter;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class IndexDataProvider extends AbstractDataProvider
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
