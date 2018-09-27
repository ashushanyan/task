<?php

namespace App\Transformers;


use App\Comment;
use Illuminate\Database\Eloquent\Model;

class CommentTransformer extends Transformer
{
    public function simpleTransform(Model $item): array
    {
        return [
            'id'            => $item->id,
            'user_id'       => $item->user_id,
            'body'          => $item->body,
            'created_at'    => $item->created_at->toDateString()
        ];
    }

    public function indexTransform(Comment $comment): array
    {
        return array_merge($this->simpleTransform($comment), [
            'user' => UserTransformer::simple($comment->user),
            'post' => PostTransformer::simple($comment->post)
        ]);
    }

}