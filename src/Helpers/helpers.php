<?php
use Stephendevs\Pagman\Models\Post\Post;


if(!function_exists('standard_posts')){

    function standard_post_types() : array
    {
        $standardPostTypes = config('pagman.standard_post_types', []);
        $webstandardPostTypes = config('web.standard_post_types', []);
       return  array_merge($standardPostTypes, $webstandardPostTypes);
    }
}

if(!function_exists('posts')){
    function posts($post_type, $paginated = false, $count = 4)
    {
        return Post::posts($post_type, $paginated, $count);
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

