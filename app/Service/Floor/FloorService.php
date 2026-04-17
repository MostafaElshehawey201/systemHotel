<?php

namespace App\Service\Floor;

use App\Exceptions\Floor\FloorCreatedNotValidException;
use App\Interfaces\Floor\CreateFloorRepositoryInterface;
use App\Interfaces\Floor\CreateFloorServiceInterface;
use Illuminate\Support\Facades\Auth;

class FloorService implements CreateFloorServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected CreateFloorRepositoryInterface $create_floor_repository_interface)
    {
        //
    }

    public function craete_floor($floorDTO, $imageRequest)
    {
        $user = Auth::user();
        $floor = $this->create_floor_repository_interface->create_floor($user);
        if ($floor) {
            $translation = $this->create_floor_repository_interface->transaltion_data_floor($floorDTO, $floor);
            if ($translation && $imageRequest) {
                return $this->create_floor_repository_interface->image_floor($imageRequest, $floor);
            }
            throw new FloorCreatedNotValidException(422);
        }
    }
}
