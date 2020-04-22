<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionWay extends Model
{

    protected $table = 'transaction_ways';

    protected $fillable = [
        'transaction_way',
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
