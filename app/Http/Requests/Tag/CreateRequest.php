<?php
/**
 * Created by PhpStorm.
 * User: Ashot
 * Date: 9/6/2018
 * Time: 12:53 PM
 */

namespace App\Http\Requests\Tag;


use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}