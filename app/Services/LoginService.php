<?php

namespace App\Services;

use App\Http\Requests\Login;
use App\Exceptions\LoginException;

class LoginService
{
    public static function handler(Login $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        
        if (!$token = auth('admin')->attempt($credentials)) {
            throw LoginException::LoginFail();
        }

        return  $token;
    }
}
