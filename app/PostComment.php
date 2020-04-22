<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'comment','user_id', 'post_id'
    ];

    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
      }
}
