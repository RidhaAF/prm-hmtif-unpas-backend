<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route::get('/admin/dashboard', function () {
    //     return view('admin.dashboard', [
    //         'title' => 'Dashboard',
    //     ]);
    // });

    Route::get('/admin/candidate', function () {
        return view('admin.candidate', [
            'title' => 'Kandidat',
        ]);
    });

    Route::get('/admin/voter', function () {
        return view('admin.voter', [
            'title' => 'Pemilih',
        ]);
    });
});
