<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CandidateController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VoteController;
use App\Http\Controllers\API\VotingTimeController;

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

Route::post('login', [UserController::class, 'login']);

Route::get('voting-time', [VotingTimeController::class, 'index']);

Route::get('candidate', [CandidateController::class, 'index']);
Route::get('quick-count', [CandidateController::class, 'quickCount']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('voter', [UserController::class, 'fetch']);
    Route::post('voter', [UserController::class, 'update']);
    Route::post('delete-photo', [UserController::class, 'deletePhoto']);
    Route::post('change-password', [UserController::class, 'changePassword']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::post('vote', [VoteController::class, 'store']);
});
