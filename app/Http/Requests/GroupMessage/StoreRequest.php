<?php

namespace App\Http\Requests\GroupMessage;


use App\Events\GroupMessagePosted;
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
            'message' => 'required'
        ];
    }

    public function persist(): self
    {
        $message = Auth::user()->groupMessages()
            ->create($this->getProcessedData());

        event(new GroupMessagePosted($message));


        return $this;
    }

    public function getProcessedData(): array
    {
        return [
            'message'  => $this->message,
            'group_id'  => $this->group_id,
        ];
    }

    public function getMessage(): string
    {
        return "Comment Success";
    }

}