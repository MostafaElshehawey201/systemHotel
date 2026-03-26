<?php

namespace App\Interfaces\Strategy;

interface ResetStrategyInterface
{
    public function supports($DTOLoginReset);

    public function otpReset($DTOLoginReset);
}
