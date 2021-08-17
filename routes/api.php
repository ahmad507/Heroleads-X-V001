<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\LeadsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/media', [MediaController::class,'index'])->name('index');
// Route::get('/media/{id}', [MediaController::class,'show'])->name('show');
// Route::post('/media', [MediaController::class,'store'])->name('store');
// Route::put('/media/{id}', [MediaController::class,'update'])->name('update');
// Route::delete('/media/{id}', [MediaController::class,'destroy'])->name('destroy');

Route::resource('/leads', LeadsController::class)->except(['edit']);
Route::resource('/media', MediaController::class)->except(['create','edit']);
Route::resource('/source', SourceController::class)->except(['create','edit']);
Route::resource('/status', StatusController::class)->except(['create','edit']);

