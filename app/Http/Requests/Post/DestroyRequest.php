<?php

namespace App\Http\Requests\Post;


use App\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('destroy', $this->post);
    }

    public function rules(): array
    {
        return [
            //
        ];
    }

    public function persist(): self
    {
        $this->post->delete();

        return $this;
    }

    public function getMessage(): string
    {
        return "Deleted";
    }
}