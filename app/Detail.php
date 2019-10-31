<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
	public function competency() {
		return $this->belongsTo('App\Competency');
	}
}
