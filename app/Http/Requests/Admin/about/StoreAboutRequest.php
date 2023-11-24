<?php

namespace App\Http\Requests\Admin\about;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'title_en'       => 'required|string|max:255',
            'title_ar'       => 'required|string|max:255',
            'short_title_en'       => 'required|string|max:255',
            'short_title_ar'       => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_en' => 'required|string',
            'short_description_ar' => 'required|string',
            'short_description_en' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
