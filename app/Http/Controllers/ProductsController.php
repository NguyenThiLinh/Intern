<?php

namespace App\Http\Controllers;

use App\Services\Products\CreateService;
use App\Services\Products\ListService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ListProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Services\Products\UpdateService;
use App\Http\Requests\UpdateProductRequest;
use App\Services\Products\DeleteService;
use App\Services\Products\ShowService;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    protected $createService;
    protected $listService;
    protected $updateService;
    protected $deleteService;
    protected $showService;
    
    public function __construct(
        CreateService $createService,
        ListService $listService,
        UpdateService $updateService,
        DeleteService $deleteService,
        ShowService $showService)
    {
        $this->createService = $createService;  
        $this->listService = $listService;
        $this->updateService = $updateService;
        $this->deleteService = $deleteService;
        $this->showService = $showService;
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
        
        return response()->json(new ProductCollection($products));
    } 

    public function update(UpdateProductRequest $request,$id)
    {
        $product = $this->updateService->update($request,$id);

        return response()->json(new ProductResource($product));
    }
    
    public function destroy($id)
    {
        $product = $this->deleteService->delete($id);

        return response()->json('Product deleted');
    }

    public function show($id)
    {
        $product = $this->showService->show($id);

        return response()->json(new ProductResource($product)); 
    }
}
