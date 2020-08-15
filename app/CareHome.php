<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareHome extends Model
{
    protected $fillable = ["name", "description", "street_address", "suburb", "postcode", "state", "locality_id"];

    public function locality() {
        return $this->belongsTo('App\Locality');
    }
}
