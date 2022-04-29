<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Download\Download;

trait Downloadable {

    public function downloads()
    {
        return $this->morphToMany(Download::class, 'downloadable');
    }

}