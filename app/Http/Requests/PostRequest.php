<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:20|max:500',
            'img' => 'mimes:jpeg,png|max:5000'
        ];
    }

    /**
     * @return array|string[]
     */
    public function attributes()
    {
        return [
            'title' => 'название поста',
            'description' => 'содержимое поста',
            'img' => 'изображение'
        ];
    }
}
