<?php

namespace App\Http\Controllers;

use App\Services\Products\CreateService;
use App\Services\Products\ListService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ListProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Services\Products\ShowService;
use App\Services\Products\DeleteService;
use App\Services\Products\UpdateService;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    protected $createService;
    protected $listService;
    protected $showService;
    protected $deleteService;
    protected $updateService;

    public function __construct(
        CreateService $createService,
        ListService $listService,
        ShowService $showService,
        DeleteService $deleteService,
        UpdateService $updateService )
    {
        $this->createService = $createService;
        $this->listService = $listService;
        $this->showService = $showService;
        $this->deleteService = $deleteService;
        $this->updateService = $updateService;
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
    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->updateService->update($request, $id);

        return response()->json(new ProductResource($product));
    }

    public function destroy($id)
    {
        // $product = $this->deleteService->delete($id);
        $product= $this->deleteService->soflDelete($id);

        return response()->json('Product deleted');
    }

    public function show($id)
    {
        $product = $this->showService->show($id);

        return response()->json(new ProductResource($product));
    }
}
