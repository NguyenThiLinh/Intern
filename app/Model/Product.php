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
    protected $table = 'products';
    protected $fillable = ['name','image','price','detail','id_category'];
    
    public function category(){
        return $this->belongsTo('App\Model\Category','id_category','id');
    }
}
