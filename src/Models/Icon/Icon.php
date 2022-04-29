<?php

namespace Stephendevs\Pagman\Models\Icon;


use Illuminate\Database\Eloquent\Model;



class Icon extends Model
{

   public function iconable()
   {
       return $this->morphT();
   }
  
}
