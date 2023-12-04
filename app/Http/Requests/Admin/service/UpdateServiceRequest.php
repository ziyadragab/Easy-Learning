<?php

namespace App\Http\Requests\Admin\service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'name_en'     => 'required|string|max:255',
            'name_ar'     => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lists'           => 'required',
            'short_description_en'=>'required|string',
            'short_description_ar'=>'required|string'

        ];
    }
}
