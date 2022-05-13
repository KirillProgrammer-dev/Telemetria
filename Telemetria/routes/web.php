<?php

use Illuminate\Support\Facades\Route;
use App\Models\Information;
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

Route::get("/allp", function(){
    $all = Information::all();
    for ($i = 1; $i <= count($all); $i++){
        if (($all[$i]->time - $all[$i-1]->time) >= 2){
            return $all[$i];
        }
    }
 });
Route::get('/{any}', function () {
    return view('app');
});
Route::get('/', function () {
    return view('app');
});
