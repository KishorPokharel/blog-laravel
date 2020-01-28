<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function post() {
    	return $this->hasMany(Post::class);
    }
}
