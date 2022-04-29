<?php

namespace Stephendevs\Pagman\Models\Media;


use Illuminate\Database\Eloquent\Model;
use Stephendevs\Pagman\Models\Post\Post;
use Stephendevs\Pagman\Categorable;




class Media extends Model
{
    use Categorable;
    
    public function posts()
    {
        return $this->morphByMany(Post::class, 'mediable');
    }
  
}
