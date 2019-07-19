<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LoginService;
use App\Http\Requests\Login;

class LoginController extends Controller
{
    protected  $adminServices;
    
    public function __construct(LoginService $adminServices)
    {
        $this->adminServices = $adminServices;
    }
    public function login(Login $request)
    {
         $data= $this->adminServices->handler($request,'admins');

         return response()->json($data);
    }
}
