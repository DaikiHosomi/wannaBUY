<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCondition extends Model
{
    protected $table = 'product_conditions';

    protected $fillable = [
        'product_condition',
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
