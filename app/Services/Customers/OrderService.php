<?php

namespace App\Services\Customers;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\Product;

class OrderService 
{
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handler($request)
    {
        //dd($request->user());
        //  dd($request->products);
        
        $data = [
            'customer_id' => $request->user()->id,
            'customer_name' => $request->user()->name,
            'customer_phone' => $request->user()->phone,
            'customer_email'=> $request->user()->email,
            'customer_address'=> $request->user()->address,
        ];
        
        
        $this->orderRepository->create($data);

        foreach($request->products  as $product )
        {
              //dd($product);
              $id = $product['id'];
              $quantity = $product['quantity'];

              $b = Product::find($id);
              $total = $b->price*$quantity;
            
            $order = array(
                'product_id' => $id,
                'quantity' => $quantity,
                'amount' => $total,    
            );

          
          // dd($order); 
           // return $this->orderRepository->create($order);
        }
    }   
}