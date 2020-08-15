<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
    public function locality() {
        return $this->belongsTo('App\Locality');
    }
}
