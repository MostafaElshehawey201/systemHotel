<?php

namespace App\Http\Controllers;

use App\Http\DTO\Auth\Floor\CreateFloorDTO;
use App\Http\Requests\Floor\CreateFloorRequest;
use App\Interfaces\Floor\CreateFloorServiceInterface;
use App\Interfaces\Floor\FloorsServiceInterface;
use App\Trait\Response\ApiResponse;

class FloorController extends Controller
{
    use ApiResponse;

    public function __construct(
        protected CreateFloorServiceInterface $create_floor_service_interface,
        protected FloorsServiceInterface $floors_service_interface
    ) {}

    public function createFloor(CreateFloorRequest $createFloorRequest)
    {
        try {
            $validation = $createFloorRequest->validated();
            $floorDTO = new CreateFloorDTO($validation);
            $this->create_floor_service_interface->craete_floor($floorDTO, $createFloorRequest['image']);
            return $this->success(__('messages.floor.create'), 201);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function floors()
    {
        try {
            $floors = $this->floors_service_interface->floors();
            return $this->success($floors, 200);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 422);
        }
    }
}
