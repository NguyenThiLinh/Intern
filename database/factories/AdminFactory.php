<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

 
use Faker\Generator as Faker;
use App\Model\Admin;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' =>$faker->unique()->email,
        'password'=> Hash::make('admin'),
    ];
});
