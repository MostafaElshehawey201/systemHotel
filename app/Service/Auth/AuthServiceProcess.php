<?php

namespace App\Service\Auth;

use App\Exceptions\Auth\AuhtPhoneExistException;
use App\Exceptions\Auth\AuthChangePasswordExcption;
use App\Exceptions\Auth\AuthEmailExistException;
use App\Exceptions\Auth\AuthOtpNotValidException;
use App\Interfaces\Auth\AuthChangePasswordRepositoryIntterface;
use App\Interfaces\Auth\AuthChangePasswordServiceInterface;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthLogoutInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Interfaces\Auth\AuthResetChangePasswordRepositoryInterface;
use App\Interfaces\Auth\AuthResetChangePasswordServiceinterface;
use App\Interfaces\Auth\AuthResetPasswordServiceInterface;
use App\Interfaces\Strategy\LoginManagerStrategyInterface;
use App\Interfaces\Strategy\ResetManagerStrategyInterface;
use Illuminate\Support\Facades\Auth;

class AuthServiceProcess implements AuthRegisterServiceInterface , AuthLoginServiceInterface , AuthLogoutInterface , AuthResetPasswordServiceInterface , AuthResetChangePasswordServiceinterface , AuthChangePasswordServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AuthRegisterRepositoryInterface $auth_register_repository_interface , protected LoginManagerStrategyInterface $login_manager_strategy_interface , protected ResetManagerStrategyInterface $reset_manager_strategy_interface ,protected AuthResetChangePasswordRepositoryInterface $auth_reset_change_password_repository_interface , protected AuthChangePasswordRepositoryIntterface $auth_change_password_repository_intterface)
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

    public function tokenResetPassword($DTOResetPassword){
        $otp = $this->auth_reset_change_password_repository_interface->dataOtp($DTOResetPassword);
        $returnCheck = $this->auth_reset_change_password_repository_interface->checkOtp($otp);
        if($returnCheck == false){
            throw new AuthOtpNotValidException(422);
        }else{
            return $returnCheck;
        }
    }

    public function changePassword($changePasswordDTO){
        $user = Auth::user();
        $returnChangePassword = $this->auth_change_password_repository_intterface->changePassword($user , $changePasswordDTO);
        if($returnChangePassword){
            return $user->currentAccessToken()->delete();
        }
        throw new AuthChangePasswordExcption(422);
    }

    public function logout($request){
        return $request->user()->currentAccessToken()->delete();
    }


}
