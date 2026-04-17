<?php

namespace App\Http\DTO\Auth\Floor;

class CreateFloorDTO
{
    public $title_ar;
    public $title_en;
    public $description_ar;
    public $description_en;


    public function __construct($validation)
    {
        $this->title_ar = $validation['title_ar'];
        $this->title_en = $validation['title_en'];
        $this->description_ar = $validation['description_ar'];
        $this->description_en = $validation['description_en'];
    }
}
