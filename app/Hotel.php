<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	public function user()
	{
		return $this->belongsTo('App\User');
	}

    public function favorites()
    {
        return $this->belongsToMany('App\User', 'favorites');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

	public function services()
	{
		return $this->belongsToMany('App\HotelService', 'hotel_hotel_service');
	}

	public function category()
	{
		return $this->belongsTo('App\HotelCategory', 'category_id');
	}

    public function rates()
    {
        return $this->hasMany('App\Rate');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
