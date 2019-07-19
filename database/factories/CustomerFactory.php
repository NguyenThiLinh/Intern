<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Model\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' =>$faker->unique()->email,
        'password'=> Hash::make('admin'),
        'phone' => '0905123456',
        'address' => $faker->address,
    ];
});
