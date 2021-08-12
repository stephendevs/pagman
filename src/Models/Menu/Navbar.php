<?php

namespace Stephendevs\Lpage\Models\Navbar;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{


    public function menu()
    {
        return $this->hasOne('\Stephendevs\Lpage\Models\Navbar\Menu');
    }
}
