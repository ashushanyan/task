<?php

namespace App\Http\Requests\Chat;


use App\Events\MessagePosted;
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
            'text_message' => 'required'
        ];
    }

    public function persist(): self
    {
        $message = Auth::user()->messages()
            ->create($this->getProcessedData());

        event(new MessagePosted($message));

        return $this;
    }

    public function getProcessedData(): array
    {
        return [
            'from_id'   => Auth::id(),
            'to_id'     => $this->to_id,
            'text'      => $this->text_message,
        ];
    }

    public function getMessage(): string
    {
        return "Comment Success";
    }
}