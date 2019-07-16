<?php
use Illuminate\Support\Facades\Route;

Route::post('login', 'Admin\LoginController@login');

Route::group([ 'middleware'=>'auth:admins'], function(){
    Route::apiResource('products','ProductsController');   
});


