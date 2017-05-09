<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
	public function category()
	{
		return $this->belongsTo('App\RoomServiceCategory', 'service_category_id');
	}

	public function rooms()
	{
		return $this->belongsToMany('App\Room', 'room_room_service');
	}
}
