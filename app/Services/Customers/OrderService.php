<?php

namespace App\Services\Customers;

use App\Repositories\OrderRepository;
use App\Model\Product;
use Illuminate\Support\Facades\DB;
use App\Model\Order;

class OrderService 
{
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handler($request)
    {
        $data = [
            'customer_id' => $request->user()->id,
            'customer_name' => $request->user()->name,
            'customer_phone' => $request->user()->phone,
            'customer_email'=> $request->user()->email,
            'customer_address'=> $request->user()->address,
        ];
        $order =  $this->orderRepository->create($data); 
        $totalMoney = 0;
        
        foreach($request->products  as $product )
        {
            $id = $product['id'];
            $quantity = $product['quantity'];
            $product = Product::find($id);
            $total = $product->price * $quantity;
            $now = now();
            $totalMoney += $total;

            $order->products()->attach($id, [
                'quantity' => $quantity,
                'amount' => $total,
                'updated_at' => $now,
                'created_at' => $now
                ]);     
        }
        DB::table('orders')->where('id',$order->id)->update(['total'=> $totalMoney]);
        
        return $order->find($order->id);  
    }   
}