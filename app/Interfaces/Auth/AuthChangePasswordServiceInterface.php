<?php

namespace App\Interfaces\Auth;

interface AuthChangePasswordServiceInterface
{
    public function changePassword($changePasswordDTO);
}
