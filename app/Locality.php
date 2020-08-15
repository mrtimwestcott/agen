<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $fillable = ["code", "name"];

    public function people() {
        return $this->hasMany('App\Person');
    }

    public function careHomes() {
        return $this->hasMany('App\CareHome');
    }
}
