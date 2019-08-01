<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Model implements JWTSubject , Authenticatable
{  
    use AuthenticableTrait;

    protected $fillable = ['name','email','password','phone','address'];
   
    public $timestamps = true;

    public function orders(){
        return $this->hasMany('App\Model\Order','customer_id','id');
    }

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function products()
    {
        return $this->belongsToMany('App\Model\Product','favorite_product','customer_id','product_id');
    }
}
