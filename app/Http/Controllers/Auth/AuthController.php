<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\Auth\AuhtPhoneExistException;
use App\Exceptions\Auth\AuthEmailExistException;
use App\Http\Controllers\Controller;
use App\Http\DTO\Auth\RegisterDTO;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Trait\Response\ApiResponse;
use Illuminate\Container\Attributes\Auth;
use Throwable;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(protected AuthRegisterServiceInterface $auth_register_service_interface) {}
    public function register(AuthRegisterRequest $authRegisterRequest)
    {
        try {
            $vlaidation = $authRegisterRequest->validated();
            $DTORegister = new RegisterDTO($vlaidation);
            $returnServiceRegister = $this->auth_register_service_interface->register($DTORegister);
            return $this->success($returnServiceRegister, 200);
        } catch (AuthEmailExistException $e) {
            return $this->error($e, 422);
        } catch (AuhtPhoneExistException $e) {
            return $this->error($e, 422);
        }
    }
}
