<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SceneController;
use App\Http\Controllers\Api\SoundController;

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


Route::get('/scenes/{id}/sounds', [SceneController::class, 'getSounds'])->name('sceneSounds');
Route::get('/scenes', [SceneController::class, 'index'])->name('scenes');


Route::get('/sounds', [SoundController::class, 'index'])->name('sounds');
Route::get('/sounds/{id}', [SoundController::class, 'getSound'])->name('sound');



