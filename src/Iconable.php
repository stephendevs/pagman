<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Icon\Icon;

trait Iconable {

    public function icon()
    {
        return $this->morphOne(Icon::class, 'iconable');
    }
    
}