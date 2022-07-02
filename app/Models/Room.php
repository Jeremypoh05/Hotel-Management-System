<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //Room belongs to RoomType
    function Roomtype(){
        return $this->belongsTo(RoomTypes::class,'room_type_id'); //the room_type_id must match with the database "room" table's column
    }
}
