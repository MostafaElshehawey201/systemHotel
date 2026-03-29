<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        "user_id" , "status" , "title" , 'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
