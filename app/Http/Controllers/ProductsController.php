<?php

namespace App\Http\Controllers;

use App\Services\Products\CreateService;
use App\Services\Products\ListService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ListProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    protected $createService;
    protected $listService;
     
    public function __construct(CreateService $createService,ListService $listService)
    {
        $this->createService = $createService;  
        $this->listService = $listService;
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
        $product = $this->createService->create($request);
         
        return response()->json(new ProductResource($product));  
    } 
    
    public function index(ListProductRequest $request)
    {  
        $products = $this->listService->index($request);
        
        return response()->json(new ProductCollection($products->paginate()));
    } 
}
