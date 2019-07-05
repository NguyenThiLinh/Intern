<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Admin; 
use JWTAuth;
use App\Http\Requests\Admin\Login;
use App\Http\Controllers\Controller;
 

class LoginController extends Controller
{
    protected  $admin;
  
    public function __construct()
{
    $this->admin = new Admin;
}
public function login(Login $request)
{    
    $credentials = $request->only('email','password');
    $token = null;
    try {
        if (! $token = auth('admin')->attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    } catch (JWTException $e) {
        return response()->json(['error' => 'could_not_create_token'], 500);
    }          
  return response()->json(compact('token'));    
}
}
