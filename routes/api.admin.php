<?php
use Illuminate\Support\Facades\Route;

Route::post('login', 'Admin\LoginController@login');

Route::group([ 'middleware'=>'auth:admins'], function(){
    Route::post('products','ProductsController@store');   
});

Route::get('products','ProductsController@index'); 
Route::post('products/update/{id}','ProductsController@update');
Route::delete('products/delete/{id}','ProductsController@destroy'); 