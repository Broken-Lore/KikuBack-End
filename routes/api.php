<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SceneController;
use App\Http\Controllers\Api\SoundController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\AuthController;

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



Route::get('/scenes/{id}/sounds', [SceneController::class, 'getSounds'])->name('sceneSounds');
Route::get('/scenes', [SceneController::class, 'index'])->name('scenes');


Route::get('/sounds', [SoundController::class, 'index'])->name('sounds');
Route::get('/sounds/{id}', [SoundController::class, 'getSound'])->name('soundById');


Route::get('/gameSound/{id}', [GameController::class, 'randomSound']);
Route::post('/compare', [GameController::class, 'soundsMatch']);


Route::post('/sounds', [SoundController::class, 'store']);

Route::get('/newGame', [GameController::class, 'newGame'])->middleware('auth:sanctum');

Route::get('/gameId/{id}', [GameController::class, 'gameId']);

Route::get('/userGames/{id}', [GameController::class, 'userGames']);

Route::get('/gameId/{id}/interactions', [GameController::class, 'gameInteractions']);
Route::post('/newInteraction', [GameController::class, 'storeSound']);

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/userInfo', [AuthController::class, 'infoUser'])->middleware('auth:sanctum');
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');









