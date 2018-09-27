<?php

namespace App\Transformers;


use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostTransformer extends Transformer
{
    public function simpleTransform(Model $item): array
    {
        return [
            'id'            => $item->id,
            'user_id'       => $item->user_id,
            'title'         => $item->title,
            'body'          => $item->body,
            'created_at'    => $item->created_at->toDateString(),
        ];
    }

    public function indexTransform(Post $item): array
    {
        return array_merge($this->simpleTransform($item), [
            'user'          =>  UserTransformer::simple($item->user),
            'comments'      =>  CommentTransformer::collection($item->comments, 'simpleTransform')
        ]);
    }

    public function showTransform(Post $post):    array
    {
        return array_merge($this->simpleTransform($post), [
            'comments'  =>  CommentTransformer::collection($post->comments, 'indexTransform')
        ]);
    }

    public function commentTransform(Post $post):    array
    {
        return array_merge($this->simpleTransform($post), [
            'comments'  =>  CommentTransformer::collection($post->comments, 'simpleTransform')
        ]);
    }

}