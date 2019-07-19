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
    
     protected $url = ['https://media.newstracklive.com/uploads/technology-news/gadgets-news-info/Jul/17/small_thumb/samsung-galaxy-note-10_5d2e9a10f2e80.jpeg',
                        'https://www.bachkhoashop.com/images/201708/goods_img/2149-g-samsung-galaxy-note-8.jpg',
                        'https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-black-400x400.jpg',
                        'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/image/AppleInc/aos/published/images/r/ef/refurb/iphoneX/refurb-iphoneX-silver_FMT_WHH?wid=400&hei=400&fmt=jpeg&qlt=80&op_usm=0.5,0.5&.v=1546626276301',
                        'https://cdn.tgdd.vn/Products/Images/42/74110/iphone-7-gold-400x400.jpg',
                        'https://cdn.tgdd.vn/Products/Images/42/114110/iphone-8-plus-hh-400x400.jpg',
                        'https://cdn.tgdd.vn/Products/Images/42/155262/oppo-f7-plus-1-400x400.jpg',
                        'https://cdn.tgdd.vn/Products/Images/42/165189/oppo-find-x-1-400x400.jpg',
                        'https://cdn.tgdd.vn/Products/Images/42/195012/samsung-galaxy-a70-white-400x400.jpg',
                        'https://www.bachkhoashop.com/images/201703/goods_img/924-g-dien-thoai-samsung-galaxy-a5-2016-bachkhoashop.jpg' ];

    public function category(){
        return $this->belongsTo('App\Model\Category','category_id','id');
    }
    
    public function getImageUrlAttribute(){
        return array_random($this->url);
    }

    public function orders(){
        
        return $this->belongsToMany('App\Model\Order','order_items','product_id','order_id');
    }
}
