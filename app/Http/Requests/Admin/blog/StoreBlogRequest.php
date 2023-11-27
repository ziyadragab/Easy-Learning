<?php

namespace App\Http\Requests\Admin\blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags'           => 'required|array',
            'tags.*'         => 'in:BUSINESS,DESIGN,LANDING PAGE,DATA,APPS,WEBSITE,BOOK,PRODUCT DESIGN',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
