<?php

namespace App\Http\DTO\Auth;


class OtpResetPasswordDTO{

    public $login;

    public function __construct($validation)
    {
        $this->login = $validation['login'];
    }
}
