<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Information;

class VideoController extends Controller
{
    public function getVideoByid(Request $request){
        return Storage::url($request->id . ".mp4");
    }
    public function getWhenNotInPlace(){
        $all = Information::orderBy('time')->get();
        $times = 0;
        for ($i = 1; $i < count($all); $i++){
            if (($all[$i]->time - $all[$i-1]->time) >= 2){
                $times += $all[$i]->time - $all[$i-1]->time;
            }
        } 
        return $times;
    }
    public function getWhenInOnePlace(){
        $all = Information::orderBy('time')->get();
        $times = 0;
        for ($i = 1; $i < count($all); $i++){
            if (abs(json_decode($all[$i]->detectionCoordinates)->x1 - json_decode($all[$i-1]->detectionCoordinates)->x1) <= 30 && abs(json_decode($all[$i]->detectionCoordinates)->y1 - json_decode($all[$i-1]->detectionCoordinates)->y1) <= 30){
                $times += $all[$i]->time - $all[$i-1]->time;
            }
        }
        return $times;
    }
}
