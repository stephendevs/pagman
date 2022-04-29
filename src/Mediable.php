<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Media\Media;

trait Mediable {
    
    public function media()
    {
        return $this->morphToMany(Media::class, 'mediable');
    }

}