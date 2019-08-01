<?php

namespace App\Http\Controllers;

use App\Services\Products\CreateService;
use App\Services\Products\ListService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ListProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Services\Products\LikeService;
use Illuminate\Http\Request;
use App\Http\Requests\FavoriteProductRequest;
use App\Services\Products\ListRecommendsService;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    protected $createService;
    protected $listService;
    protected $likeService;
    protected $listRecommendService;
    
    public function __construct(
        CreateService $createService,
        ListService $listService,
        LikeService $likeService,
        ListRecommendsService $listRecommendService)
    {
        $this->createService = $createService;  
        $this->listService = $listService;
        $this->likeService = $likeService;
        $this->listRecommendService = $listRecommendService;
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

    public function favorite(FavoriteProductRequest $request)
    {
        $product = $this->likeService->favorite($request);
       
        return response()->json($product);
    }

    public function  recommends(Request $request)
    {
        $product = $this->listRecommendService->listRecommends($request);
        
        return response()->json(new ProductCollection($product));
    }

}
