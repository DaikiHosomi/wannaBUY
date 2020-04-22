<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'id', 'product_id', 'user_id'
    ];

    public function product() {
        return $this->belongsTo(\App\Product::class, 'product_id', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
