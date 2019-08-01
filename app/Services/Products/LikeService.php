<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use Request;
use App\Model\FavoriteProduct;
use Illuminate\Support\Carbon;

class LikeService 
{
    public function __construct(ProductRepositoryEloquent $productRepositoryEloquent)
    {
        $this->productRepositoryEloquent = $productRepositoryEloquent;
    }

    public function favorite($request)
    {
        $product = array(
            'customer_id' => $request->user()->id,
            'product_id' => $request->get('id'),
            'star' => $request->get('star'),
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        );
        
        FavoriteProduct::insert($product);
        return $product;
    }
}
