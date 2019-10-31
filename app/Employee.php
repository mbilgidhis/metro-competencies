<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function scores() {
    	return $this->hasMany('App\DetailEmployee');
    }
}
