<?php

namespace App\Exceptions;

use Exception;

class CreateException extends Exception
{
    public static function LoginFail($code = 400)
    {
        return new self(__('message.create_failed'), $code);
    }
}