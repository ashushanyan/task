<?php

namespace App\Http\Requests\Comment;


use App\Policies\CommentPolicy;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DestroyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('destroy', $this->comment);
    }

    public function rules()
    {
        return [
          //
        ];
    }

    public function persist(): self
    {
        $this->comment->delete();

        return $this;
    }

    public function getMessage(): string
    {
        return "Comment Deleted";
    }
}