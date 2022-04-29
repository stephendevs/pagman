<?php
use Stephendevs\Pagman\Models\Post\Post;
use Stephendevs\Pagman\Models\Option\Option;


if(!function_exists('standard_post_types')){

    function standard_post_types() : array
    {
        $standardPostTypes = config('pagman.standard_post_types', []);
        $webstandardPostTypes = config('web.standard_post_types', []);
       return  array_merge($standardPostTypes, $webstandardPostTypes);
    }
}

if(!function_exists('custom_posts_types')){
    function custom_posts_types()
    {
        return array_merge([
            'test' => 'pagman::tests'
        ], config(config('pagman.theme', 'pagman').'.custom_post_types', []));
    }
}

if(!function_exists('posts')){
    function posts($post_type = null, $paginated = false, $count = 4)
    {
        return Post::posts($post_type, $paginated, $count);
    }
}

if(!function_exists('post')){
    function post($post_type, $post_key = null){
        return ($post_key != null) ? Post::where('post_type', $post_type)->where('post_key', $post_key)->first() : Post::where('post_type', $post_type)->first();
    }
}



if(!function_exists('find_post')){
    function find_post($id)
    {
        return Post::findOrFail($id);
    }
}

if(!function_exists('posts_with_media')){
    function posts_with_media()
    {

    }
}

if(!function_exists('pm_updateOrCreateOption')){
    function pm_updateOrCreateOption($key, $value) : bool{
        if(!Option::where('option_key', $key)->update(['option_value' => $value])){
            return (Option::create(['option_key' => $key, 'option_value' => $value])) ? true : false;
        }else{
            return true;
        }
    }
}

if(!function_exists('pm_option')){
    function pm_option($key, $default = null){
        $option = Option::option('option_key', $key)->first();

        return ($option) ? $option->option_value : $default;
    }
}

if(!function_exists('theme')){
    function theme(){
        return config('pagman.theme', 'aamsnm');
    }
}
