<?php

namespace App\Interfaces\Floor;

interface CreateFloorRepositoryInterface
{
    public function create_floor($user);

    public function transaltion_data_floor($floorDTO , $floor);

    public function image_floor($imageRequest , $floor);
}
