<?php

namespace App\Strategies\Auth;

use App\Exceptions\Auth\PasswordErrorException;
use App\Exceptions\Auth\PhoneNotFoundException;
use App\Interfaces\Strategy\LoginStrategyInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class PhoneStrategy implements LoginStrategyInterface
{
    /**
     * Create a new class instance.
     */
    public function supports($DTOLogin)
    {
        return preg_match('/^[0-9]{10,14}$/', $DTOLogin->login);
    }

    public function login($DTOLogin)
    {
        $user = User::where('phone', $DTOLogin->login)->first();
        if (!$user) {
            throw new PhoneNotFoundException(404);
        }

        if (!Hash::check($DTOLogin->password, $user->password)) {
            throw new PasswordErrorException(422);
        }

        return [
            "token" => $user->createToken('auth_token')->plainTextToken,
            "user" => $user
        ];
    }
}
