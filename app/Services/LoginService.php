<?php

namespace App\Services;
 
use App\Exceptions\LoginException;
use Illuminate\Http\Request;

class LoginService
{
    
    public static function handler(Request $request,$guard)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
    
        if (!$token = auth($guard)->attempt($credentials)) {
            throw LoginException::LoginFail();
        }
        return  ['token'=> $token];
    }
}
