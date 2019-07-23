<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Services\Customers\OrderService;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order (OrderRequest $request)
    {
        $order = $this->orderService->handler($request);

        return response()->json($order);
    }
}