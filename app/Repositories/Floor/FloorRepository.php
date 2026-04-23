<?php

namespace App\Repositories\Floor;

use App\Interfaces\Floor\CreateFloorRepositoryInterface;
use App\Interfaces\Floor\FloorsRepositoryInterface;
use App\Models\Floor;
use App\Models\Translation;

class FloorRepository implements CreateFloorRepositoryInterface , FloorsRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create_floor($user)
    {
        return Floor::create([
            "user_id" => $user->id,
            "status" => 1
        ]);
    }

    public function transaltion_data_floor($floorDTO, $floor)
    {
        $data = [
            'title' => [
                "ar" => $floorDTO->title_ar,
                "en" => $floorDTO->title_en,
            ],
            'description' => [
                'ar' => $floorDTO->description_ar,
                'en' => $floorDTO->description_en,
            ],
        ];
        foreach ($data as $key => $translations) {
            foreach ($translations as $locale => $value) {
                return Translation::create([
                    "translatable_id" => $floor->id,
                    "translatable_type" => Floor::class,
                    "locale" => $locale,
                    "key" => $key,
                    "value" => $value,
                ]);
            }
        }
    }
    public function image_floor($imageRequest, $floor)
    {
        if ($imageRequest) {
            $imageName = time() . "." . $imageRequest->getClientOriginalName();
            $image = $imageRequest->storeAs('floors', $imageName, 'public');
            return $floor->update([
                "image" => $image,
            ]);
        }
    }

    public function floors(){
        return Floor::with('transalations:translatable_id,value')->select('id')->get();
    }
}
