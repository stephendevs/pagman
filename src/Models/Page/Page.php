<?php

namespace Stephendevs\Lpage\Models\Page;


use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

   protected $table = 'pages';

   protected $casts = [
       'is_parent' => 'boolean',
       'is_child' => 'boolean',
       'published' => 'boolean'
   ];

   public function getNameAttribute($value)
   {
       return ucwords($value);
   }

   public function menus()
   {
       return $this->belongsToMany('Stephendevs\Lpage\Models\Menu\Menu', 'menu_items');
   }
}
