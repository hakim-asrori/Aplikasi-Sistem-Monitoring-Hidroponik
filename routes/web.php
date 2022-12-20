<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\RekapController;
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

// WEB
Route::get('/', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['otentikasi'])->group(function () {
    // Logout
    Route::get('logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);

    // Device
    Route::resource('devices', DeviceController::class);

    // Grafik
    Route::get('grafik', [GrafikController::class, 'index']);

    // Rekap
    Route::get('rekap', [RekapController::class, 'index']);
    Route::get('tds/download', [RekapController::class, 'tdsDownload']);
    Route::get('ph/download', [RekapController::class, 'phDownload']);
});
