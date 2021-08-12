<?php

namespace Stephendevs\Lpage\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $guarded = [];

    protected $casts = [
        'is_primary' => 'boolean',
        'footer' => 'boolean'
    ];

    public function pages()
    {
        return $this->belongsToMany('Stephendevs\Lpage\Models\Page\Page', 'menu_items');
    }

}
