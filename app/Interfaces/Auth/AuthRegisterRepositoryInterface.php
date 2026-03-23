<?php

namespace App\Interfaces\Auth;

interface AuthRegisterRepositoryInterface
{
    public function email($email);

    public function phone($phone);

    public function register($DTORegister);
}
