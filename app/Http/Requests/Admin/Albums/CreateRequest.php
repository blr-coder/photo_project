<?php

namespace App\Http\Requests\Admin\Albums;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|unique:albums|string|max:190',
            'description' => 'nullable|max:5000',
            'date' => 'nullable|date',

            'image_file' => 'required|image|max:2048',

            'photographer' => 'nullable|string|max:190',
            'location' => 'nullable|string|max:190',
        ];
    }
}
