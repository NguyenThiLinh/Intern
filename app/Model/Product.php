<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Product.
 *
 * @package namespace App\Model;
 */
class Product extends Model  
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image','price','detail','category_id'];
    
    public function category(){
        return $this->belongsTo('App\Model\Category','category_id','id');
    }

    public function getImageUrlAttribute(){
        return env('IMAGE_URL') . $this->image;
    }
}
