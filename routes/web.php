<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

// for link storage in production
Route::get('/linkstorage', function () {
    Artisan::call('storage:link'); // this will do the command line job
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/votes/export/excel/', [DashboardController::class, 'exportExcel'])->name('admin.votes.export.excel');
    Route::get('admin/votes/export/pdf/', [DashboardController::class, 'exportPdf'])->name('admin.votes.export.pdf');

    Route::resource('admin/candidate', CandidateController::class);

    Route::resource('admin/voter', UserController::class);
});
