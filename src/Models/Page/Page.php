<?php

namespace Stephendevs\Pagman\Models\Page;


use Illuminate\Database\Eloquent\Model;
use Stephendevs\Pagman\Traits\PostRelation;

class Page extends Model
{
    use PostRelation;
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
