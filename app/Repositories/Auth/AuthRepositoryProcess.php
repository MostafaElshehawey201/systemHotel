<?php

namespace App\Repositories\Auth;

use App\Interfaces\Auth\AuthChangePasswordRepositoryIntterface;
use App\Interfaces\Auth\AuthLoginByPhoneInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthResetChangePasswordRepositoryInterface;
use App\Interfaces\Auth\AuthResetEmailRepositoryInterface;
use App\Interfaces\Auth\AuthResetPhoneRepositoryInterface;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepositoryProcess implements AuthRegisterRepositoryInterface, AuthLoginByPhoneInterface, AuthResetEmailRepositoryInterface, AuthResetPhoneRepositoryInterface, AuthResetChangePasswordRepositoryInterface, AuthChangePasswordRepositoryIntterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function email($email)
    {
        return User::where('email', $email)->exists();
    }

    public function phone($phone)
    {
        return User::where('phone', $phone)->exists();
    }

    public function register($DTORegister)
    {
        return User::create([
            "name" => $DTORegister->name,
            "email" => $DTORegister->email,
            "phone" => $DTORegister->phone,
            "password" => Hash::make($DTORegister->password),
        ]);
    }

    public function reset($DTOLoginReset)
    {
        return User::where('email', $DTOLoginReset->login)->first();
    }

    public function resetByPhone($DTOLoginReset)
    {
        return User::where('phone', $DTOLoginReset->login)->first();
    }

    public function otp($return)
    {
        $otp = random_int(100000, 999999);
        Otp::create([
            "user_id" => $return->id,
            "otp" => $otp,
            "used" => 0,
            "expires_at" => now()->addMinutes(2),
        ]);
        return $otp;
    }

    public function dataOtp($DTOResetPassword)
    {
        return Otp::with('user')->where('otp', $DTOResetPassword->otp)->first();
    }
    public function checkOtp($otp)
    {
        if ($otp->used == 1 && $otp->expires_at < now()) {
            return false;
        } else {
            $user = $otp->user;
            $otp->update([
                "user" => 'user_id',
                "expires_at" => now(),
                "used" => 1,
            ]);
            return $user->createToken('auth_token')->plainTextToken;
        }
    }

    public function changePassword($user, $changePasswordDTO)
    {
        return $user->update([
            "password" => Hash::make($changePasswordDTO->password),
        ]);
    }
}
