<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'content', 'thumbnail', 'slug'];

    public function getRouteKeyName() {
        return 'slug';
    }
}
