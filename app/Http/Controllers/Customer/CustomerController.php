<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use App\Services\LoginService;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(LoginService $customerService)
    {
        $this->customerService = $customerService;
    }
    
    public function login(Login $request)
    {
         $data= $this->customerService->handler($request,'users');

         return response()->json($data);
    }
}
