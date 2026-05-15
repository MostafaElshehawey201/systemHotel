<?php

namespace App\Exceptions\Floor;

use Exception;

class EditIdFloorNotValidException extends Exception
{
    public function
    __construct(int $code)
    {
        return parent::__construct(__('messages.floor.IdNotValid') , $code);
    }
}
