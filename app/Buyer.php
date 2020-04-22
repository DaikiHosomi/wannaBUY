<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = [
        'user_id','product_id', 'sold'
    ];

    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
      }

      public function product() {
        return $this->belongsTo(\App\Product::class, 'product_id', 'id');
    }


}
