<?php

namespace App\Strategies\Auth;

use App\Exceptions\Auth\PhoneNotFoundException;
use App\Interfaces\Auth\AuthResetPhoneRepositoryInterface;
use App\Interfaces\Strategy\ResetStrategyInterface;

class ResetPhoneStrategy implements ResetStrategyInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AuthResetPhoneRepositoryInterface $auth_reset_phone_repository_interface)
    {
        //
    }

    public function supports($DTOLoginReset)
    {
        return preg_match('/^[0-9]{10,14}$/', $DTOLoginReset->login);
    }

    public function otpReset($DTOLoginReset)
    {
        $return = $this->auth_reset_phone_repository_interface->resetByPhone($DTOLoginReset);
        if ($return == 0) {
            throw new PhoneNotFoundException(422);
        }
        return $this->auth_reset_phone_repository_interface->otp();
    }
}
