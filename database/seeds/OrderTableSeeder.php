<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'customer_id' => App\Model\Customer::all()->random()->id,
           
        ]);
      
    }
}