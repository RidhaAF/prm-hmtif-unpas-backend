<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CandidateController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VoteController;

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

Route::resource('candidate', CandidateController::class);

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('voter', [UserController::class, 'fetch']);
    Route::post('voter', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::resource('vote', VoteController::class);
});
