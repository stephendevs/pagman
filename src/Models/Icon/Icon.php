<?php

namespace Stephendevs\Pagman\Models\Icon;


use Illuminate\Database\Eloquent\Model;



class Icon extends Model
{
    protected $guarded = [];

   public function iconable()
   {
       return $this->morphT();
   }
  
}
