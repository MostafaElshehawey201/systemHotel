<?php

namespace App\Interfaces\Auth;

interface AuthResetChangePasswordRepositoryInterface
{
    public function dataOtp($DTOResetPassword);

    public function checkOtp($otp);
}
