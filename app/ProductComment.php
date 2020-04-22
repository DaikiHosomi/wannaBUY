<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = [
        'comment','created_at'
    ];

    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
      }

      public function wannaBuyer() {
        return $this->belongsTo(\App\Buyer::class, 'buyer_id', 'id');
    }


    

}
