<?php

namespace App\Service\Auth;

use App\Exceptions\Auth\AuhtPhoneExistException;
use App\Exceptions\Auth\AuthEmailExistException;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;

class AuthServiceProcess implements AuthRegisterServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AuthRegisterRepositoryInterface $auth_register_repository_interface)
    {
        //
    }

    public function register($DTORegister) {
        $email = $this->auth_register_repository_interface->email($DTORegister->email);
        if($email == true){
            throw new AuthEmailExistException(422);
        }
        $phone = $this->auth_register_repository_interface->phone($DTORegister->phone);
        if($phone == true){
            throw new AuhtPhoneExistException(422);
        }
        return $this->auth_register_repository_interface->register($DTORegister);
    }
}
