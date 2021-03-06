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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post("login",'App\Http\Controllers\Api\UserController@login');
Route::get("translateFile",'App\Http\Controllers\Api\UserController@translateFile');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('appointments', 'App\Http\Controllers\Api\AppointmentsController');
});

