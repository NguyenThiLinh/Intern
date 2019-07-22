<?php

namespace App\Services\Products;

use App\Repositories\ProductRepositoryEloquent;
use App\Criteria\SortByColumnCriteria;
use App\Filters\NameFilter;
use App\Criteria\FilterCriteria;
use App\Filters\CategoryIdFilter;
use App\Filters\PriceLteFilter;
use App\Filters\PriceGteFilter;

class ListService
{
	public $allowfilters = [
		'name' => NameFilter::class,
		'category_id' => CategoryIdFilter::class,
		'price_lte' => PriceLteFilter::class,
		'price_gte' => PriceGteFilter::class,	 
	];

	public function __construct(ProductRepositoryEloquent $productRepository )
	{
		$this->productRepository = $productRepository;
	}

	public function index($request)
	{
		$this->productRepository->pushCriteria(new SortByColumnCriteria($request->order,['name','price']));
		
		$this->productRepository->pushCriteria(new FilterCriteria($request->all(), $this->allowfilters));

		if($request->has('per_page'))
		{
			return $this->productRepository->paginate($request->per_page);
		}

		return  $this->productRepository->all();	 
	}
}
