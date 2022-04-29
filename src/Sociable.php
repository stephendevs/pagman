<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\SocialLink\SocialLink;

trait Sociable {

    public function sociallinks()
    {
        return $this->morphMany(SocialLink::class, 'sociable');
    }
    
}