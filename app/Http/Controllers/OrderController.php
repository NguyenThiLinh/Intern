<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Services\Customers\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order(Request $request)
    {
        $order = $this->orderService->handler($request);

        return response()->json($order);
    }
}