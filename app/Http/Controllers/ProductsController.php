<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\ProductServices;
use App\Http\Requests\ProductRequest;
/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productServices;
    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     */
    public function __construct(ProductServices $productServices )
    {
        $this->productServices = $productServices;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $products = $this->productServices->index();

        return response()->json($products);
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
    public function store(ProductRequest $request)
    {
        return $this->productServices->create($request);
    }
}
