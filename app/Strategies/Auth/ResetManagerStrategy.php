<?php

namespace App\Strategies\Auth;

use App\Interfaces\Strategy\ResetManagerStrategyInterface;

class ResetManagerStrategy implements ResetManagerStrategyInterface
{
    /**
     * Create a new class instance.
     */
    public $stratgies;

    public function __construct(ResetEmailStrategy $resetEmailStrategy, ResetPhoneStrategy $resetPhoneStrategy)
    {
        $this->stratgies = [
            $resetEmailStrategy,
            $resetPhoneStrategy,
        ];
    }

    public function otpResetPassword($DTOLoginReset)
    {
        foreach ($this->stratgies as $strategy) {
            if ($strategy->supports($DTOLoginReset)) {
                return $strategy->otpReset($DTOLoginReset);
            }
        }
    }
}
