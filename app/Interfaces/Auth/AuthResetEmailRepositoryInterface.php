<?php

namespace App\Interfaces\Auth;

interface AuthResetEmailRepositoryInterface
{
    public function reset($DTOLoginReset);

    public function otp();
}
