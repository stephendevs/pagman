<?php
namespace Stephendevs\Pagman\Traits;

trait PostRelation {

    public function sociallinks()
    {
        return $this->morphMany('Stephendevs\Pagman\Models\SocialLink\SocialLink', 'owner');
    }
    public function author()
    {
        return $this->belongsTo('App\User');
    }
 
    public function updatedby()
    {
        return $this->belongsTo('App\User');
    }
 
    public function media()
    {
         return $this->hasMany('Stephendevs\Pagman\Models\Post\PostMedia');
    }
}