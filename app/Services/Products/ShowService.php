<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;

class ShowService
{
    public function __construct(ProductRepositoryEloquent $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
       
        return $product;
    }
}