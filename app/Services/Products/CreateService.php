<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\Storage;

class CreateService
{
  public function __construct(ProductRepositoryEloquent $productRepository)
  {
     $this->productRepository = $productRepository;
  }

  public function create(CreateProductRequest $request)
  {
      $file = $request->file('image');
      $originalName = $file->getClientOriginalName();
      $image = 'product-'.time() . $originalName;
      Storage::disk('local')->put('public/products/'.$image, (string) file_get_contents($file));
      $file_url = '/products/'. $image;

      $product = array(
        'name' => $request->get('name'),
        'image' => $file_url,
        'detail' => $request->get('detail'),
        'price' => $request->get('price'),
        'category_id' => $request->get('category_id'),
      );
      
      $product = $this->productRepository->create($product);
      
      return $product; 
  }
}
