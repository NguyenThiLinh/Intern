<?php

namespace App\Services\Customers;

use App\Repositories\OrderRepository;
use App\Model\Product;
use App\Model\OrderItem;

class OrderService 
{
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handler($request)
    {
        $customer = [
            'customer_id' => $request->user()->id,
            'customer_name' => $request->user()->name,
            'customer_phone' => $request->user()->phone,
            'customer_email'=> $request->user()->email,
            'customer_address'=> $request->user()->address,
        ];
        $totalMoney = 0;
        $arrayId = array_column($request->products,'id');
        $collections = Product::whereIn('id',$arrayId)->get();
        
        $data = array();

        foreach($collections as $c )
        {
            foreach($request->products as $product)
            {
                if($c->id ==$product['id'])
                {
                    $quantity = $product['quantity']; 
                }
                $amount = $c->price*$quantity;
                $now = now();
                
            }   
            $totalMoney += $amount;

            $object = array(
                'product_id'=>$c->id,
                'quantity' => $quantity,
                'amount' => $amount,
                'updated_at' => $now,
                'created_at' => $now,
            );
            array_push($data,$object); 
        }
        
        $customer['total'] = $totalMoney;
        $order =  $this->orderRepository->create($customer);
        $orderItems = [];

        foreach($data as $orderItem) {
            $orderItem['order_id'] = $order->id;
            $orderItems[] = $orderItem;
        }

        OrderItem::insert($orderItems);
            return $order;  
    }   
}