<?php

namespace App\Services\Customers;

use App\Repositories\OrderRepository;
use App\Model\Product;
 
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
          
        foreach($request->products  as $product )
        {
            $id = $product['id'];
            $quantity = $product['quantity'];
            $product = Product::find($id);
            $total = $product->price * $quantity;
            $now = now();

            $order->products()->attach($id, [
                'quantity' => $quantity,
                'amount' => $total,
                'updated_at' => $now,
                'created_at' => $now
                ]); 
        }
        
        $sum = $product->sum('amount');
         
        return $order;  
    }   
}