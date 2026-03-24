<?php

namespace App\Exceptions\Auth;

use Exception;

class PhoneNotFoundException extends Exception
{
    public function __construct($code)
    {
        return parent::__construct(__('messages.phone.notFound'), $code);
    }
}
