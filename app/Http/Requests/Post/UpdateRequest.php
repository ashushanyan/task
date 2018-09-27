<?php


namespace App\Http\Requests\Post;


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
            'post_title'    => "required",
            'post_body'     => "required",
        ];
    }

    public function persist(): self
    {
        $this->post->tags()->sync ($this->tag_ids);
        $this->post->update($this->getProcessedData());

        return $this;
    }

    public function getProcessedData(): array
    {
        return array_merge($this->all(), [
            'title' => $this->post_title ?? 'no title',
            'body'  => $this->post_body ?? 'no body'
        ]);
    }

    public function getMessage(): string
    {
        return "Success";
    }
}