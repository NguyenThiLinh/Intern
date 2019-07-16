<?php

namespace App\Http\Controllers;

use App\Services\Products\CreateService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\Products as ProductResource;
 
/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    protected $createServices;
     
    public function __construct(CreateService $createServices )
    {
        $this->createServices = $createServices;  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateProductRequest $request)
    {
        $product = $this->createServices->create($request);
         
        return response()->json(new ProductResource($product));  
    }   
}
