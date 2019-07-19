<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = true;

    public function orders(){
        return $this->hasMany('App\Model\Order','customer_id','id');
    }

}
