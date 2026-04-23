<?php

namespace App\Exceptions\Floor;

use Exception;


class NotExsistingFloorsException extends Exception
{
    public function __construct($code)
    {
        return parent::__construct(__('messages.floors.notExsisting') , $code);
    }
}
