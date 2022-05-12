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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('schedules/all', 'App\Http\Controllers\SchedulesController@all');
Route::post('schedules/date', 'App\Http\Controllers\SchedulesController@date');
Route::post('schedules/appointment', 'App\Http\Controllers\SchedulesController@appointment');
Route::delete('schedules/delete/{id}', 'App\Http\Controllers\SchedulesController@delete');
