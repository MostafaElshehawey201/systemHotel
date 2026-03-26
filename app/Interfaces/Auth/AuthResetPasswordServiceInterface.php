<?php

namespace App\Interfaces\Auth;

interface AuthResetPasswordServiceInterface
{
    public function otpResetPassword($DTOLoginReset);
}
