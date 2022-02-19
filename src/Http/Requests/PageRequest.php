<?php

namespace Stephendevs\Pagman\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'post_title' => 'required|unique:posts,post_title',
            'extract_text' => 'nullable|min:3|max:200',
            'post_featured_image' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'post_title.required' => 'Please Provide Post Title .........',
            'post_title.unique' => 'The post with this title already exists .........',
        ];
    }
}
