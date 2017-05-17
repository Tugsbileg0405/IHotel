<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelService extends Model
{
	public function category()
	{
		return $this->belongsTo('App\HotelServiceCategory', 'service_category_id');
	}

	public function hotels()
	{
		return $this->belongsToMany('App\Hotel', 'hotel_hotel_service');
	}
}
