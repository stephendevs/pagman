<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Contact\Contact;

trait Contactable {

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

}