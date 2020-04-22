<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'introduction','department','gender', 'grade', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function products() {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }

    public function favorites(){
        return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id')->withTimestamps();
    }

    public function favorite($productId) {
        $exist = $this->is_favorite($productId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($productId);
            return true;
        }
    }

    public function unfavorite($productId)
    {
        $exist = $this->is_favorite($productId);

        if($exist){
            $this->favorites()->detach($productId);
            return true;
        }else{
            return false;
        }
    }

    public function is_favorite($productId)
    {
        return $this->favorites()->where('product_id',$productId)->exists();
    }

    public function wannaBuyers(){
        return $this->hasMany(\App\Buyer::class,'user_id', 'id');
      }

}
