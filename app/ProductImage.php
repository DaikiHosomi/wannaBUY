<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_image', 'product_id'
    ];

    public function product(){
        return $this->belongsTo(\App\Product::class,'product_id');
    }
    


}
