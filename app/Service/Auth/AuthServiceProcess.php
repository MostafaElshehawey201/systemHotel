<?php

namespace App\Service\Auth;

use App\Exceptions\Auth\AuhtPhoneExistException;
use App\Exceptions\Auth\AuthEmailExistException;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthLogoutInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Interfaces\Auth\AuthResetPasswordServiceInterface;
use App\Interfaces\Strategy\LoginManagerStrategyInterface;
use App\Interfaces\Strategy\ResetManagerStrategyInterface;
use Illuminate\Support\Facades\Auth;

class AuthServiceProcess implements AuthRegisterServiceInterface , AuthLoginServiceInterface , AuthLogoutInterface , AuthResetPasswordServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AuthRegisterRepositoryInterface $auth_register_repository_interface , protected LoginManagerStrategyInterface $login_manager_strategy_interface , protected ResetManagerStrategyInterface $reset_manager_strategy_interface)
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

    public function login($DTOLogin){
        return $this->login_manager_strategy_interface->LoginManagerStrategyInterfaceMethod($DTOLogin);
    }

    public function otpResetPassword($DTOLoginReset){
        return $this->reset_manager_strategy_interface->otpResetPassword($DTOLoginReset);
    }

    public function logout($request){
        return $request->user()->currentAccessToken()->delete();
    }
}
