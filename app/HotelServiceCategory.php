<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelServiceCategory extends Model
{
	public function services()
	{
		return $this->hasMany('App\HotelService', 'service_category_id');
	}
}
