<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Interfaces\Profile\ProfileUserInterface;
use App\Trait\Response\ApiResponse;
use Throwable;

class ProfileUserController extends Controller
{
    use ApiResponse;

public function __construct(protected ProfileUserInterface $profile_user_interface)
{

}
    public function profile(){
        try{
            $profile = $this->profile_user_interface->profile();
            return $this->success($profile , 200);
        }catch(Throwable $e){
            return $this->error($e , 422);
        }
    }
}
