<?php

namespace App\Http\Requests\Admin\homeSlide;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeSlideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_en'     => 'required|string|max:255',
            'title_ar'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video'       => 'nullable|string'
        ];
    }
}
