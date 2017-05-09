<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'surname', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin',
    ];

    public function isAdmin()
    {
        if ($this->is_admin)
        {
            return true;
        }
        
        return false;
    }

    public function isHotelAdmin()
    {
        if ($this->hotels()->count() > 0)
        {
            return true;
        }
        
        return false;
    }

    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Hotel', 'favorites');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
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

    public function comments()
    {
        return $this->hasMany('App\PostComment', 'user_id');
    }
}
