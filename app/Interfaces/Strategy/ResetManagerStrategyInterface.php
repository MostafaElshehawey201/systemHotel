<?php

namespace App\Interfaces\Strategy;

interface ResetManagerStrategyInterface
{
    public function otpResetPassword($DTOLoginReset);
}
