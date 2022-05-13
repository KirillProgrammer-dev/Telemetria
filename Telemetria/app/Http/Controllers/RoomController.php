<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Camera;

class RoomController extends Controller
{
    public function getAllCamerasByRoomId($id){
        $cameras = Camera::where("room_id", $id)->get()->first();
        return $cameras;
    }    

    public function getAllRooms(){
        $rooms = Room::all();
        $roomsWithCameras = array();
        foreach($rooms as $room){
            $roomsWithCameras[$room->name] = self::getAllCamerasByRoomId($room->id);
        }
        return json_encode($roomsWithCameras, JSON_UNESCAPED_UNICODE);
    }
}
