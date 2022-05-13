<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Camera;

class RoomController extends Controller
{
    public function getAllRooms(){
        $rooms = Room::all();
        return json_encode($rooms, JSON_UNESCAPED_UNICODE);
    }

    public function getAllCamerasByRoomId(Request $request){
        $cameras = Camera::where("room_id", $request->id)->get()->first();
        return json_encode($cameras, JSON_UNESCAPED_UNICODE);
    }    
}
