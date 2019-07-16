<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use App\Http\Requests\ListProductRequest;

class ListService
{
	public function __construct(ProductRepositoryEloquent $product)
	{
		$this->product = $product;
	}

	public function index(ListProductRequest $request)
	{
		$this->product->scopeQuery(function ($query) use ($request) {

			if ($request->has('name')) {
				$query =  $query->where('name', 'like', "%{$request->name}%");
			}

			if ($request->has('category_id')) {
				$query  = $query->where('category_id', '=', $request->category_id);
			}

			if ($request->has('price_min')) {
				$query = $query->where('price', '>=', $request->price_min);
            }
            
			if ($request->has('price_max')) {
				$query = $query->where('price', '<=', $request->price_max);
            }
            
			return $query;
		});

		return $this->product->all();
	}
}