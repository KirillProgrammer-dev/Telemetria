<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Camera;

class RoomController extends Controller
{
    public function getAllCamerasByRoomId($id){
        $cameras = Camera::where("room_id", $id)->get();
        return json_decode($cameras);
    }    

    public function getAllRooms(){
        $rooms = Room::all();
        $roomsWithCameras = array();
        $i = 0;
        foreach($rooms as $room){
            $roomsWithCameras[$i] = array("nameroom" => $room->name, "id" => $room->id, "cameras" => self::getAllCamerasByRoomId($room->id));
            $i++;
        }
        
        return json_encode($roomsWithCameras, JSON_UNESCAPED_UNICODE);
    }
}
