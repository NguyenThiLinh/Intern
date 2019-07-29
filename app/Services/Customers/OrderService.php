<?php

namespace App\Services\Customers;

use App\Repositories\OrderRepository;
use App\Model\Product;
use Illuminate\Support\Facades\DB;
use App\Model\OrderItem;
use App\Model\Order;

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
        //dd($arrayId);
       // $product = DB::table('products')->whereIn('id',$arrayId)->get();
        $collections = Product::whereIn('id',$arrayId)->get();
        //dd($product);
        
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
               //'order_id'=>$order->id,
                'product_id'=>$c->id,
                'quantity' => $quantity,
                'amount' => $amount,
                'updated_at' => $now,
                'created_at' => $now,
            );
            array_push($data,$object); 
        }
       // dd($totalMoney);
       //dd($data);
        $customer['total'] = $totalMoney;
    
        $order =  $this->orderRepository->create($customer); 
        //dd($order);

        $orderItems = [];
        foreach($data as $orderItem) {
            $orderItem['order_id'] = $order->id;
            $orderItems[] = $orderItem;
        }
         dd($orderItems);

        OrderItem::insert($orderItems);
    
        // $data = array_map(function($orderItem) use ($order){
        //     $orderItem['order_id']= $order->id;
        //     return $orderItem;
        // },$data);
        // dd($data);
        return $order;  
    }   
}