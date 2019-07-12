<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Faker\Generator as Faker;
use App\Model\Comment;


$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'star' => 'd2',
    ];;
});
