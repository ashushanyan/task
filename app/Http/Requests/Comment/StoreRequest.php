<?php

namespace App\Http\Requests\Comment;


use App\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'body'      => 'required'
        ];
    }

    public function persist(): self
    {
        Post::find($this->post_id)->comments()
            ->create($this->getProcessedData());

        return $this;
    }

    public function getProcessedData(): array
    {
        return [
            'post_id'   => $this->post_id,
            'user_id'   => Auth::id(),
            'body'      => $this->body
        ];
    }

    public function getMessage(): string
    {
        return "Comment Success";
    }
}