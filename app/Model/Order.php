<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;

    public function customer(){
        
        return $this->belongsTo('App\Model\Customer','customer_id','id');
    }

    public function  products(){
        
        return $this->belongsToMany('App\Model\Product','order_items','order_id','product_id');
    }
}
