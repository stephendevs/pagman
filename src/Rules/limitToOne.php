<?php

namespace Stephendevs\Pagman\Rules;

use Illuminate\Contracts\Validation\Rule;
use Stephendevs\Pagman\Models\Post\Post;

class limitToOne implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (in_array($value, config(config('pagman.theme', 'pagman').'.unique_standard_post_types', []))) {
            $check = Post::where('post_type', $value)->get();
            return (count($check) > 0) ? false : true;
        } else {
            return true;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This :attribute must be unique ... consider editing it';
    }
}
