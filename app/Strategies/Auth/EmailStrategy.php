<?php

namespace App\Strategies\Auth;

use App\Exceptions\Auth\EmailNotFoundException;
use App\Exceptions\Auth\PasswordErrorException;
use App\Interfaces\Strategy\LoginStrategyInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmailStrategy implements LoginStrategyInterface
{
    /**
     * Create a new class instance.
     */

    public function supports($DTOLogin)
    {
        return filter_var($DTOLogin->login, FILTER_VALIDATE_EMAIL);
    }

    public function login($DTOLogin)
    {
        $user = User::where('email', $DTOLogin->login)->first();
        if (!$user) {
            throw new EmailNotFoundException(404);
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
