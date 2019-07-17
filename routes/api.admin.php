<?php
use Illuminate\Support\Facades\Route;

Route::post('login', 'Admin\LoginController@login');

Route::group([ 'middleware'=>'auth:admins'], function(){
    Route::post('products','ProductsController@store');   
});

Route::get('products','ProductsController@index'); 
