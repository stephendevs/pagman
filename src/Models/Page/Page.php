<?php

namespace Stephendevs\Pagman\Models\Page;


use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

   protected $table = 'pages';
   protected $guarded = [];
   

   protected $casts = [
       'is_parent' => 'boolean',
       'is_child' => 'boolean',
       'published' => 'boolean'
   ];

   public function getTitleAttribute($value)
   {
       return ucwords($value);
   }

   public function menus()
   {
       return $this->belongsToMany('Stephendevs\Pagman\Models\Menu\Menu', 'menu_items');
   }
}
