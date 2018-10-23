<?php

namespace App\Http\Requests\GroupChat;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'group_name'    => "required|string|max:20",
        ];
    }

    public function persist(): self
    {
        $this->groupChat->update($this->getProcessedData());

        return $this;
    }

    public function getProcessedData(): array
    {
        return array_merge($this->all(), [
            'name' => $this->group_name,
        ]);
    }

    public function getMessage(): string
    {
        return "Success";
    }
}