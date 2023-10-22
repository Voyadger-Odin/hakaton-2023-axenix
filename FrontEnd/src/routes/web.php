<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/stock/{stock_id?}', function ($stock_id=0) {
    return view('stock', [
        'stock_id' => $stock_id
    ]);
})
    ->where('stock_id', '[0-9]+')
    ->name('stock');

Route::get('/analytics/{forklift_id?}', function ($forklift_id=null) {
    return view('analytics', [
        'forklift_id' => $forklift_id
    ]);
})
    ->where('forklift_id', '[0-9]+')
    ->name('analytics');


Route::get('/analytics/pdf/{forklift_id}', [\App\Http\Controllers\Controller::class, 'get_analytic_pdf'])
    ->where('forklift_id', '[0-9]+')
    ->name('analytics_pdf');
