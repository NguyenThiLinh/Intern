<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Http\Request;

class UpdateService 
{
    public function __construct(ProductRepositoryEloquent $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function update($request,$id)
    {
      $product = $this->productRepository->update($request->all(),$id);
      return $product;
    }
}