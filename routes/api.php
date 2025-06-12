<?php

use App\Http\Controllers\Api\AuthenticateController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/register', [AuthenticateController::class, 'register']);
Route::post('/login', [AuthenticateController::class, 'login']);

Route::get('/laporan/total-permintaan', [ReportController::class, 'totalPermintaan']);
Route::get('/laporan/kategori-terbanyak', [ReportController::class, 'kategoriTerbanyak']);
Route::get('/laporan/laporan-permintaan', [ReportController::class, 'laporanPermintaan']);
