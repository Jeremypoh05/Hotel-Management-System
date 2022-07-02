<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    use HasFactory;
    
    function roomtypeimgs(){
        return $this->hasMany(RoomTypeImage::class,'room_type_id'); //roomtypes has many roomtypeimage
    }
}
