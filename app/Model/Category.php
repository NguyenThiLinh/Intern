<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public $timestamps = true;

    public function products(){
        return $this->hasMany('App\Model\Product','category_id','id');
    }

}
