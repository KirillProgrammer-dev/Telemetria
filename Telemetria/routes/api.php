<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/check-token', function (Request $request) {
    return true;
});


Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/token', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if($user == null){
        return null;
    }
    // Проверка пароля!
    if(Hash::check($request->password, $user->password)){
        $token = $user->createToken($request->device_name, ['*', 'allow-edit'])->plainTextToken;
        $user->remember_token = $token;
        $user->save();
        return $token;
    }else{
        return null;
    }
});