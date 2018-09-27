<?php

namespace App\Http\Requests\Tag;

use App\Post;
use App\Tag;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tag'       => 'required',
        ];
    }

    public function persist(): self
    {
        if($this->post_id == null){
            Tag::create($this->getProcessedData());
        }else {
            $tag = Tag::create($this->getProcessedData());
            $tag->posts()->attach($this->post_id);
        }

        return $this;
    }

    public function getProcessedData(): array
    {
        return [
            'name'      => $this->tag,
        ];
    }

    public function getMessage(): string
    {
        return "Tag Created";
    }
}