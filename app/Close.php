<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Close extends Model
{
	public function room()
	{
		return $this->belongsTo('App\Room');
	}

	public function order()
	{
		return $this->belongsTo('App\Order');
	}
}
