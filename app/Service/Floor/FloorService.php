<?php

namespace App\Service\Floor;

use App\Exceptions\Floor\EditIdFloorNotValidException;
use App\Exceptions\Floor\FloorCreatedNotValidException;
use App\Exceptions\Floor\NotExsistingFloorsException;
use App\Interfaces\Floor\CreateFloorRepositoryInterface;
use App\Interfaces\Floor\CreateFloorServiceInterface;
use App\Interfaces\Floor\EditFloorRepositoryInterface;
use App\Interfaces\Floor\EditFloorServiceInterface;
use App\Interfaces\Floor\FloorsRepositoryInterface;
use App\Interfaces\Floor\FloorsServiceInterface;
use Illuminate\Support\Facades\Auth;

class FloorService implements CreateFloorServiceInterface, FloorsServiceInterface, EditFloorServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected CreateFloorRepositoryInterface $create_floor_repository_interface,
        protected FloorsRepositoryInterface $floors_repository_interface,
        protected EditFloorRepositoryInterface $edit_floor_repository_interface,
    ) {
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

    public function floors()
    {
        $floors = $this->floors_repository_interface->floors();
        if ($floors->isEmpty()) {
            throw new NotExsistingFloorsException(422);
        }
        return $floors;
    }

    public function editFloor($floorID) {
        if($floorID <= 0){
            throw new EditIdFloorNotValidException(422);
        }
        return $this->edit_floor_repository_interface->editFloor($floorID);
    }
}
