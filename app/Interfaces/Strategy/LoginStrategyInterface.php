<?php

namespace App\Interfaces\Strategy;

interface LoginStrategyInterface
{
    public function supports($DTOLogin);

    public function login($DTOLogin);
}
