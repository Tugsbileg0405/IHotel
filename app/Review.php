<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content', 'user_id', 'hotel_id',
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
