<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailEmployee extends Model
{
	public function employee() {
		return $this->belongsTo('App\Employee');
	}

	public function detail() {
		return $this->belongsTo('App\Detail', 'detail_id', 'id');
	}
}
