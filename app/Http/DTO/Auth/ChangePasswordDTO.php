<?php

namespace App\Http\DTO\Auth;


class ChangePasswordDTO{
    public $password;

    public function __construct($vlaidation)
    {
        $this->password = $vlaidation['password'];
    }
}
