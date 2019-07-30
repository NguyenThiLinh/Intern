<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use App\Model\Product;
use Carbon\Carbon;

class DeleteService
{
    public function __construct(ProductRepositoryEloquent $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    //delete normal
    public function delete($id)
    {
        $this->productRepository->delete($id);   
    }
    //soft delete
    public function soflDelete($id)
    {
        $product = Product::find($id);
        $ts = Carbon::now();
        $product->deleted_at = $ts;
        $product->save();
    }

}