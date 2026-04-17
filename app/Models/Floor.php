<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        "user_id" , "status" , 'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transalations(){
        return $this->morphMany(Translation::class,'translatable');
    }
}
