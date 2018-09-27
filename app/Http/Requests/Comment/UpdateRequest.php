<?php

namespace App\Http\Requests\Comment;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'body'  => 'sometimes|required'
        ];
    }

    public function persist(): self
    {
        $this->comment->update($this->getProcessedData());

        return $this;
    }

    public function getProcessedData(): array
    {
        return array_merge($this->all(), [
            'body'  => $this->body . 'updated'
        ]);
    }

    public function getMessage(): string
    {
        return "Success Comment Edit";
    }
}