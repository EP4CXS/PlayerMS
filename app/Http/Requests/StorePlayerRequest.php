<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The player name is required.',
            'name.string' => 'The player name must be a string.',
            'name.max' => 'The player name may not be greater than 255 characters.',
            'price.required' => 'The talent fee is required.',
            'price.numeric' => 'The talent fee must be a number.',
            'price.min' => 'The talent fee must be at least 0.',
        ];
    }
}