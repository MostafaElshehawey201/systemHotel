<?php

namespace App\Strategies\Auth;

use App\Interfaces\Strategy\LoginManagerStrategyInterface;

class LoginManagerStrategy implements LoginManagerStrategyInterface
{
    /**
     * Create a new class instance.
     */
    private $strategies;
    public function __construct(EmailStrategy $emailStrategy, PhoneStrategy $phoneStrategy)
    {
        $this->strategies = [
            $emailStrategy,
            $phoneStrategy
        ];
    }

    public function LoginManagerStrategyInterfaceMethod($DTOLogin)
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($DTOLogin)) {
                return $strategy->login($DTOLogin);
            }
        }
    }
}
