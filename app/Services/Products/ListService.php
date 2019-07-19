<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use App\Http\Requests\ListProductRequest;
use App\Criteria\SortByColumnCriteria;
use Illuminate\Database\Eloquent\Collection;

class ListService
{
	 
	public function __construct(ProductRepositoryEloquent $productRepository )
	{
		$this->productRepository = $productRepository;
	}

	public function index(ListProductRequest $request)
	{
		$this->productRepository->pushCriteria(new SortByColumnCriteria($request->order,['name','price']));
 
		$this->productRepository->scopeQuery(function ($query) use ($request) {

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
		 
		if($request->has('number_per_page'))
		{
			return $this->productRepository->paginate($request->number_per_page);
		}
		
		return  $this->productRepository->all();	 
	}
}
