<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'product_name','introduction', 'price', 'class_name', 
        'product_image_id', 'product_category_id', 'product_condition_id',
        'transaction_way_id','user_id',
    ];

    public function user() {
        return $this->belongsTo(\App\User::class,'user_id');
    }

    public function favorites(){
        return $this->belongsToMany(\App\User::class, 'favorites', 'product_id', 'user_id')->withTimestamps();
    }
    

    public function productCategory() {
        return $this->belongsTo(\App\ProductCategory::class,'product_category_id');
    }

    public function productCondition() {
        return $this->belongsTo(\App\ProductCondition::class,'product_condition_id');
    }

    public function transactionWay() {
        return $this->belongsTo(\App\TransactionWay::class,'transaction_way_id');
    }

    public function productImages() {
        return $this->hasMany(\App\ProductImage::class);
    }

    public function productComments(){
        return $this->hasMany(\App\ProductComment::class,'product_id', 'id');
      }

    public function wannaBuyers(){
        return $this->hasMany(\App\Buyer::class,'product_id', 'id');
      }
    

   





}
