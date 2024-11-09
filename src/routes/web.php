<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StampController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [RegisteredUserController::class, 'index']);
});


Route::get('/attendance', [AttendanceController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/attendance', [StampController::class, 'index']);
    Route::post('/attendance/start-work', [StampController::class, 'startWork'])->name('attendance.startWork');
    Route::post('/attendance/end-work', [StampController::class, 'endWork'])->name('attendance.endWork');
    Route::post('/attendance/start-break', [StampController::class, 'startBreak'])->name('attendance.startBreak');
    Route::post('/attendance/end-break', [StampController::class, 'endBreak'])->name('attendance.endBreak');
});