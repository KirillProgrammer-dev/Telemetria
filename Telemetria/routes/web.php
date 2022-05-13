<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Room;
use App\Models\Camera;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichs
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get("/createadmin", function () {
    $user = new User;
    $user->login = "admin";
    $user->password = "admin";
    $user->name = "admin";

    $user->save();
});
Route::get("/createroom", function () {
    $room = new Room;
    $room->name = "Ленина 71";

    $room->save();

    $id = $room->id;

    $camera = new Camera;
    $camera->name = "2-ой этаж";
    $camera->room_id = $id;
    $camera->save();
});