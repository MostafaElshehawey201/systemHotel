<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $fillable = [
        "translatable_id" , 'translatable_type' , 'locale' , 'key' , 'value'
    ];

    public function translatable(){
        return $this->morphTo();
    }
}
