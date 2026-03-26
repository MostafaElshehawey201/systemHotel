<?php

namespace App\Strategies\Auth;

use App\Exceptions\Auth\EmailNotFoundException;
use App\Interfaces\Auth\AuthResetEmailRepositoryInterface;
use App\Interfaces\Strategy\ResetStrategyInterface;

class ResetEmailStrategy implements ResetStrategyInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AuthResetEmailRepositoryInterface $auth_reset_email_repository_interface)
    {
        //
    }

    public function supports($DTOLoginReset)
    {
        return filter_var($DTOLoginReset->login, FILTER_VALIDATE_EMAIL);
    }

    public function otpReset($DTOLoginReset)
    {
        $return = $this->auth_reset_email_repository_interface->reset($DTOLoginReset);
        if ($return == null) {
            throw new EmailNotFoundException(422);
        }

        return $this->auth_reset_email_repository_interface->otp($return);
    }
}
