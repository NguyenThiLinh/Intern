<?php

namespace App\Services\Products;

use App\Repositories\ProductRepository;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductServices
{
  public function __construct(ProductRepository $product)
  {
     $this->product = $product;
  }

  public function create(ProductRequest $request)
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
        'id_category' => $request->get('id_category'),
      );
      
      $product = $this->product->create($product);
      return ['message'=>'Add product successfully','data'=>$product]; 
  }
}
