<?php

namespace App\Http\Requests\Post;


use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class AddTagInPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tag_id'       => 'required',
        ];
    }

    public function persist(): self
    {
        $post =Post::find($this->post_id);
        $post->tags()->attach($this->tag_id);

        return $this;
    }

    public function getMessage(): string
    {
        return "Success";
    }
}