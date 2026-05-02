<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'display_name' => ['nullable', 'string', 'max:50'],
            'bio'          => ['nullable', 'string', 'max:160'],
            'bio_full'     => ['nullable', 'string', 'max:5000'],
            'location'     => ['nullable', 'string', 'max:100'],
            'avatar'          => ['nullable', 'image', 'max:2048'],
            'selected_avatar' => ['nullable', 'string'],
        ];
    }
}
