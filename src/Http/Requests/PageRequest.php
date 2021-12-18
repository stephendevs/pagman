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
            'title' => 'required|unique:pages,title',
            'slug' => 'required|unique:pages,slug',
            'url' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please provide page title',
            'title.unique' => 'There is already a page with this title',
            'slug.required' => 'Please provide page slug',
        ];
    }
}
