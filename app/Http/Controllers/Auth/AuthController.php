<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\Auth\AuhtPhoneExistException;
use App\Exceptions\Auth\AuthEmailExistException;
use App\Exceptions\Auth\AuthInvalidLoginDataException;
use App\Exceptions\Auth\EmailNotFoundException;
use App\Exceptions\Auth\PasswordErrorException;
use App\Exceptions\Auth\PhoneNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\DTO\Auth\LoginDTO;
use App\Http\DTO\Auth\RegisterDTO;
use App\Http\DTO\Auth\ResetPasswordDTO;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Http\Requests\Auth\AuthResetPasswordRequest;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthLogoutInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Interfaces\Auth\AuthResetPasswordServiceInterface;
use App\Trait\Response\ApiResponse;
use Illuminate\Container\Attributes\Auth;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(protected AuthRegisterServiceInterface $auth_register_service_interface, protected AuthLoginServiceInterface $auth_login_service_interface, protected AuthLogoutInterface $auth_logout_interface, protected AuthResetPasswordServiceInterface $auth_reset_password_service_interface) {}
    public function register(AuthRegisterRequest $authRegisterRequest)
    {
        try {
            $vlaidation = $authRegisterRequest->validated();
            $DTORegister = new RegisterDTO($vlaidation);
            $returnServiceRegister = $this->auth_register_service_interface->register($DTORegister);
            return $this->success($returnServiceRegister, 200);
        } catch (AuthEmailExistException $e) {
            return $this->error($e->getMessage(), 422);
        } catch (AuhtPhoneExistException $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    public function login(AuthLoginRequest $authLoginRequest)
    {
        try {
            $validation = $authLoginRequest->validated();
            $DTOLogin = new LoginDTO($validation);
            $data = $this->auth_login_service_interface->login($DTOLogin);
            return $this->success($data, 200);
        } catch (EmailNotFoundException $e) {
            return $this->error($e->getMessage(), 404);
        } catch (PhoneNotFoundException $e) {
            return $this->error($e->getMessage(), 422);
        } catch (PasswordErrorException $e) {
            return $this->error($e->getMessage(), 412);
        } catch (AuthInvalidLoginDataException $e) {
            return $this->error($e->getMessage(), 411);
        }
    }

    public function otpResetPassword(AuthResetPasswordRequest $authResetPasswordRequest)
    {
        try {
            $validation = $authResetPasswordRequest->validated();
            $DTOLoginReset = new ResetPasswordDTO($validation);
            $otp = $this->auth_reset_password_service_interface->otpResetPassword($DTOLoginReset);
            return $this->success($otp, 200);
        } catch (PhoneNotFoundException $e) {
            return $this->error($e->getMessage(), 422);
        } catch (EmailNotFoundException $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    public function resetPassword(){
        
    }

    public function logout(Request $request)
    {
        try {
            $return = $this->auth_logout_interface->logout($request);
            return $this->success(__('messages.logout.done'), 200);
        } catch (Throwable $e) {
            return $this->error($e->getMessage(), 501);
        }
    }
}
