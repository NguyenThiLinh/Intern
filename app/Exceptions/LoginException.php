<?php

namespace App\Exceptions;

use Exception;

class LoginException extends Exception
{
    public static function LoginFail($code = 400)
    {
        return new self(__('message.loginfail'), $code);
    }
}