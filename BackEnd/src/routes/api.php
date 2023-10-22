<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stock', [\App\Http\Controllers\Controller::class, 'stock']);
Route::get('/forklifts/{stock_id?}', [\App\Http\Controllers\Controller::class, 'forklifts'])->where('stock_id', '[0-9]+');
Route::get('/warehouses', [\App\Http\Controllers\Controller::class, 'warehouses']);

Route::get('/analytics/{forklift_id}', [\App\Http\Controllers\Controller::class, 'get_analytics_forklift'])->where('forklift_id', '[0-9]+');

Route::prefix('/forklift')->group(function (){
    Route::post('/started_task', [\App\Http\Controllers\ForkliftController::class, 'started_task']);
    Route::post('/finished_task', [\App\Http\Controllers\ForkliftController::class, 'finished_task']);
    Route::post('/reach_the_point', [\App\Http\Controllers\ForkliftController::class, 'reach_the_point']);
    Route::post('/reach_the_target', [\App\Http\Controllers\ForkliftController::class, 'reach_the_target']);

    Route::get('/test/{target}', [\App\Http\Controllers\ForkliftController::class, 'test']);
});
