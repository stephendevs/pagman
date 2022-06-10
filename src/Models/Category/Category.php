<?php

namespace Stephendevs\Pagman\Models\Category;


use Illuminate\Database\Eloquent\Model;
use Stephendevs\Pagman\Models\Post\Post;
use Stephendevs\Pagman\Models\Media\Media;



class Category extends Model
{


    public function posts()
    {
        return $this->morphedByMany(Post::class, 'categorable');
    }

    public function media()
    {
        return $this->morphByMany(Media::class, 'mediable');
    }
  
}
