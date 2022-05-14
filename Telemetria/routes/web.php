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
Route::get('/{any}/{id}', function () {
    return view('app');
});
Route::get('/{any}', function () {
    return view('app');
});
Route::get('/', function () {
    return view('app');
});
