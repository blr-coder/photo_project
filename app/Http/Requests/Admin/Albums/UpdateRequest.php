<?php

namespace App\Http\Requests\Admin\Albums;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:190',
            'description' => 'nullable|max:500',
            'date' => 'nullable|date',

            'image_file' => 'image|max:2048',

            'photographer' => 'nullable|string|max:190',
            'location' => 'nullable|string|max:190',
        ];
    }
}
