<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ArticleRequest extends FormRequest
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
            'title' => 'required|max:255|min:6',
            'desc' => 'required',
//            'slug' => 'required|unique:articles',
            'content' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:5000',
            'categories' => 'required',
        ];
    }
}
