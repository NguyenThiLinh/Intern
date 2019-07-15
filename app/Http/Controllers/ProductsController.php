<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\Products\CreateService;
use App\Http\Requests\CreateProductRequest;
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
    protected $createServices;
    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     */
    public function __construct(CreateService $createServices )
    {
        $this->createServices = $createServices;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {  
    //     $products = $this->createServices->index();

    //     return response()->json($products);
    // } 
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
        return $this->createServices->create($request);
    }
}
