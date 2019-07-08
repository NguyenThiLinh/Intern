<?php
Route::post('login', 'Admin\LoginController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('logout', 'Admin\LogoutController@logout');
});
