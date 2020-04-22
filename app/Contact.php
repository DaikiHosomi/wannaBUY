<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'copmment'   
    ];

    public function user() {
        return $this->belongsTo(\App\User::class,'user_id');
    }

}
