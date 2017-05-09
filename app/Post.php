<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\PostCategory', 'post_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
    	return $this->hasMany('App\PostComment', 'post_id');
    }
}
