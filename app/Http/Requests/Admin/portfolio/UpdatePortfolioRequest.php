<?php

namespace App\Http\Requests\Admin\portfolio;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
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
            'name_en'     => 'required|string|max:255',
            'name_ar'     => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
