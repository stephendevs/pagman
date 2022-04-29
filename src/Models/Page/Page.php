<?php

namespace Stephendevs\Pagman\Models\Page;


use Illuminate\Database\Eloquent\Model;
use Stephendevs\Pagman\Traits\MenuItemTypeModel as MenuItems;
use Stephendevs\Pagman\Traits\PostRelation;
use Stephendevs\Pagman\Mediable;
use Stephendevs\Pagman\Categorable;
use Stephendevs\Pagman\Iconable;
use Stephendevs\Pagman\Sociable;
use Stephendevs\Pagman\Downloadable;
use Stephendevs\Pagman\Contactable;

class Page extends Model
{
    use MenuItems, PostRelation, Mediable, Categorable, Iconable, Sociable, Contactable;

    protected $table = 'posts';
    protected $guarded = [];

    protected $casts = [
       'is_parent' => 'boolean',
       'is_child' => 'boolean',
       'published' => 'boolean'];

   public function scopePage($query, $key, $with = [])
   {
       return (count($with) > 0) ?  $query->with($with)->where('post_type', 'page')->where('post_key', $key) :  $query->where('post_type', 'page')->where('post_key', $key);
   }

   public function getTitleAttribute($value)
   {
       return ucwords($value);
   }

   public function menus()
   {
       return $this->belongsToMany('Stephendevs\Pagman\Models\Menu\Menu', 'menu_items');
   }
}
