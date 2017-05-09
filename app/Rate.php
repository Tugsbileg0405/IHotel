<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'employees', 'fresh', 'comfort', 'location', 'price', 'user_id', 'hotel_id',
    ];
    
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function hotel()
	{
		return $this->belongsTo('App\Hotel');
	}
}
