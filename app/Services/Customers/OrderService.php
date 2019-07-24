<?php

namespace App\Services\Customers;

use App\Repositories\OrderRepository;
use App\Model\Product;
use Illuminate\Support\Facades\DB;
 
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
        
        //dd($request->products);

        $arrayId = array_column($request->products,'id');
        //dd($arrayId);
        $product = DB::table('products')->whereIn('id',$arrayId)->get();
        dd($product);

        // $arrayQuantity = array_column($request->products,'quantity');
        // dd($arrayQuantity);

        $collection = collect($request->products);
        //dd( $collection);
        $quantity= $collection->where('quantity');
        

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
            $order->total = $totalMoney;
            $order->save();
        
        return $order;  
    }   
}