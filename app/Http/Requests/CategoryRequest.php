<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name' => 'required|unique:categories|max:255|min:2',
            'slug' => 'required',
        ];
    }

    public function messages()
    {
       return [
            'category_name.required' => 'Kateqoriya boş ola bilməz.',
            'category_name.unique' => 'Kateqoriya adi tekrarlana bilmez.',
        ];
    }
}
