<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomServiceCategory extends Model
{
	public function services()
	{
		return $this->hasMany('App\RoomService', 'service_category_id');
	}
}
