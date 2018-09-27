<?php

namespace App\Http\Requests\Post;


use App\Post;
use App\Tag;
use App\User;
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
            'title' => 'required|min:3',
            'body'  => 'required',
        ];
    }

    public function persist(): self
    {
//        dd();
        if($this->tag_id == null){
            Auth::user()->posts()
                ->create($this->getProcessedData());
        }else{
            $post = Auth::user()->posts()
                ->create($this->getProcessedData());

            $post->tags()->attach($this->tag_id);
        }

        return $this;
    }

    public function getProcessedData(): array
    {
        return [
            'title'     => $this->title,
            'body'      => $this->body
        ];
    }

    public function getMessage(): string
    {
        return "Success";
    }
}