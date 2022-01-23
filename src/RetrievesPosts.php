<?php

namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Post\Post;


trait RetrievesPosts {

    protected function posts($post_type, $paginated = false, $count = 4){
        return Post::posts($post_type, $paginated, $count);
    }

    protected function post($post_type, $post_key){
        return Post::where('post_type', $post_type)->where('post_key', $post_key)->firstOrFail();
    }
}