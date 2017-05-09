<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function hotel()
	{
		return $this->belongsTo('App\Hotel');
	}

	public function closes()
	{
		return $this->hasMany('App\Close');
	}

	public function pickup()
	{
		return $this->belongsTo('App\Pickup');
	}
}
