<?php

namespace App\Interfaces\Auth;

interface AuthResetPhoneRepositoryInterface
{

    public function resetByPhone($DTOLoginReset);
    public function otp();
}
