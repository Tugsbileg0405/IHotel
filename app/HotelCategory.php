<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelCategory extends Model
{
	public function hotels()
	{
		return $this->hasMany('App\Hotel', 'category_id');
	}
}
