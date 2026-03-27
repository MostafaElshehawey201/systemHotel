<?php

namespace App\Exceptions\Auth;

use Exception;


class AuthChangePasswordExcption extends Exception
{
    public function
    __construct(int $code)
    {
        return parent::__construct(__('messages.password.notChange') , $code);
    }
}
