<?php

namespace App\Services;

use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class LogoutService
{
    protected $jwt;
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public  function logout(Request $request)
    {
        $token =  $request->header('Authorization');
        $this->jwt->parseToken()->invalidate();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
