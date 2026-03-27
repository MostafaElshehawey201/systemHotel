<?php

namespace App\Exceptions\Auth;

use Exception;


class AuthOtpNotValidException extends Exception
{
    public function
    __construct(int $code)
    {
        return parent::__construct(__('messages.otp.notValid'), $code);
    }
}
