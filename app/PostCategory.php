<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post', 'post_category_id');
    }
}
