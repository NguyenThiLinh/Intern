<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;

class DeleteService
{
    public function __construct(ProductRepositoryEloquent $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function delete($id)
    {
        $this->productRepository->delete($id);
         
    }
}