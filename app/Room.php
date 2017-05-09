<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	public function hotel()
	{
		return $this->belongsTo('App\Hotel');
	}
	
	public function category()
	{
		return $this->belongsTo('App\RoomCategory', 'room_category_id');
	}
	
	public function services()
	{
		return $this->belongsToMany('App\RoomService', 'room_room_service');
	}

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function closes()
    {
    	return $this->hasMany('App\Close');
    }

    public function sales()
    {
    	return $this->hasMany('App\Sale');
    }
}
