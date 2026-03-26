<?php

namespace App\Http\DTO\Auth;


class ResetPasswordDTO{

    public $login;

    public function __construct($validation)
    {
        $this->login = $validation['login'];
    }
}
