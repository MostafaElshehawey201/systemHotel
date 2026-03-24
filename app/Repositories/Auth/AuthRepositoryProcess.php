<?php

namespace App\Repositories\Auth;

use App\Interfaces\Auth\AuthLoginByPhoneInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepositoryProcess implements AuthRegisterRepositoryInterface , AuthLoginByPhoneInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function email($email){
        return User::where('email' , $email)->exists();
    }

    public function phone($phone){
        return User::where('phone' , $phone)->exists();
    }

    public function register($DTORegister){
        return User::create([
            "name" => $DTORegister->name,
            "email" => $DTORegister->email,
            "phone" => $DTORegister->phone,
            "password" => Hash::make($DTORegister->password),
        ]);
    }
}
