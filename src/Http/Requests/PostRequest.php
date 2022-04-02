<?php

namespace Stephendevs\Pagman\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Stephendevs\Pagman\Rules\limitToOne;

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
            'post_title' => ['required', 'unique:posts,post_title'],
            'post_key' => ['nullable', 'unique:posts,post_key'],
            'post_type' => ['required', new limitToOne],
            'extract_text' => 'nullable|min:3|max:200',
            'post_featured_image' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'post_title.required' => 'Please Provide Post Title .........',
        ];
    }

    public function attributes()
    {
        return [
            'post_title' => 'post title '
        ];

    }
}
