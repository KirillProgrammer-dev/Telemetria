<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Information;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;


class VideoController extends Controller
{
    public function getVideoByid(Request $request)
    {
        $media = FFMpeg::open($request->id . '.mp4');
        $media->addFilter("-ss", $request->start)->addFilter("-t", $request->interval)->export()
            ->toDisk('tmpvideos')
            ->inFormat(new \FFMpeg\Format\Video\X264)
            ->save($request->id . '.mp4');

        return "/tmpvideos" . "/" . $request->id . ".mp4";
    }
    public function getWhenNotInPlace()
    {
        $all = Information::orderBy('time')->get();
        $times = 0;
        for ($i = 1; $i < count($all); $i++) {
            if (($all[$i]->time - $all[$i - 1]->time) >= 5) {
                $times += $all[$i]->time - $all[$i - 1]->time;
            }
        }
        return $times;
    }
    public function getWhenInOnePlace()
    {
        $all = Information::orderBy('time')->get();
        $times = 0;
        for ($i = 1; $i < count($all); $i++) {
            if (abs(json_decode($all[$i]->detectionCoordinates)->x1 - json_decode($all[$i - 1]->detectionCoordinates)->x1) <= 30 && abs(json_decode($all[$i]->detectionCoordinates)->y1 - json_decode($all[$i - 1]->detectionCoordinates)->y1) <= 30) {
                $times += $all[$i]->time - $all[$i - 1]->time;
            }
        }
        return $times;
    }

    public function getSections()
    {
        $all = Information::orderBy('time')->get();
        $array = array(array());
        $time = 0;
        $e = 0;
        for ($i = 1; $i < count($all); $i++) {
            if ($all[$i]->time != $all[$i - 1]->time) {
                if (($all[$i]->time - $all[$i - 1]->time) >= 5) {
                    $array[0][$e] = array("nip", $all[$i]->time - $all[$i - 1]->time);
                } else {
                    $array[0][$e] = array("work", $all[$i]->time - $all[$i - 1]->time);
                }
                $time += $all[$i]->time - $all[$i - 1]->time;
                $e++;
            }
        }
        $array[1] = $time;
        return json_encode($array);
    }
    public function getShortVideo(Request $request)
    {
        $media = FFMpeg::open($request->id . '.mp4');
        $media->addFilter("-ss", "00:00:03")->addFilter("-t", 55)->export()
            ->toDisk('tmpvideos')
            ->inFormat(new \FFMpeg\Format\Video\X264)
            ->save($request->id . '.mp4');

        return "ok";
    }
}
