<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VideoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/check-token', [UserController::class, "checkToken"]);


Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/token', [UserController::class, "getToken"]);
Route::post('/log-out', [UserController::class, "logOut"])->middleware(['auth:sanctum']);
Route::post('/registration', [UserController::class, "registration"]);
Route::post('/all-rooms', [RoomController::class, "getAllRooms"]);
Route::post('/get-video-link-by-id', [VideoController::class, "getVideoById"]);
Route::post("/get-when-not-in-place", [VideoController::class, "getWhenNotInPlace"]);
Route::post("/get-when-in-one-place", [VideoController::class, "getWhenInOnePlace"]);