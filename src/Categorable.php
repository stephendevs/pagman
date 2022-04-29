<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Category\Category;

trait Categorable {

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorable');
    }

}