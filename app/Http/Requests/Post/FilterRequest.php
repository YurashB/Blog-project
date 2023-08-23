<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags_id' => '',
            'page' => '',
            'perPage' => '',
        ];
    }
}
