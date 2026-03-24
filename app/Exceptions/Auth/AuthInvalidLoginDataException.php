<?php

namespace App\Exceptions\Auth;

use Exception;

class AuthInvalidLoginDataException extends Exception
{
    public function __construct( $code )
    {
        return parent::__construct(__('messages.login.invalid'), $code);
    }
}
