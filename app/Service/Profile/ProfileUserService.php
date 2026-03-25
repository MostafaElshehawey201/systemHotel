<?php

namespace App\Service\Profile;

use App\Interfaces\Profile\ProfileUserInterface;
use Illuminate\Support\Facades\Auth;

class ProfileUserService implements ProfileUserInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function Profile(){
        return Auth::guard('sanctum')->user();
    }
}
