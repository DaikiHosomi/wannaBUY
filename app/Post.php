<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title','published_at'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(\App\User::class,'user_id');
    }

    public function postComments(){
        return $this->hasMany(\App\PostComment::class,'post_id', 'id');
    }

    
}
