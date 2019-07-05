<?php

use Illuminate\Http\Request;
use App\Model\Admin;


Route::post('adminlogin', 'Admin\LoginController@login');
 
