<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    public function details() {
    	return $this->hasMany('App\Detail');
    }

    public function detailsemployee() {
    	return $this->hasMany('App\DetailEmployee');
    }
}
