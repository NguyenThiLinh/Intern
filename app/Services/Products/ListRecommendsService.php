<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use App\Model\Product;
use Illuminate\Database\Eloquent\Builder;

class ListRecommendsService
{
    public function __construct(ProductRepositoryEloquent $productRepository )
	{
		$this->productRepository = $productRepository;
    }
    
    public function listRecommends($request)
    { 
        $product = Product::whereHas('customers', function (Builder $query) {
        $query->where('star','>=',3);})->get();
        return  $product;
    }
}