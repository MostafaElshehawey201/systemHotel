<?php

namespace App\Interfaces\Auth;

interface AuthChangePasswordRepositoryIntterface
{
    public function changePassword($user , $changePasswordDTO);
}
