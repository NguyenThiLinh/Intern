<?php

namespace App\Services;

use App\Http\Requests\Login;

class LoginService
{

    public static function validatelogin(Login $request)
    {

        $credentials = $request->only('email', 'password');

        $token = null;
        try {
            if (!$token = auth('admin')->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
}
