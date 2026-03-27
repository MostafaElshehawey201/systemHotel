<?php

namespace App\Interfaces\Auth;

interface AuthResetChangePasswordServiceinterface
{
    public function tokenResetPassword($DTOResetPassword);
}
