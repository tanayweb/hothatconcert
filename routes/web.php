<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActionController;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/register', [ActionController::class, 'register'])->name('register');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/report', [AdminController::class, 'report'])->name('report');
    Route::post('/get_crowd_list', [AdminController::class, 'get_crowd_list'])->name('get_crowd_list');
    Route::get('export_data', [AdminController::class, 'fileExport'])->name('export_data');
});
Route::get('/clear-cache', function () {
    \Artisan::call('cache:clear');
    dd("Cache Clear All");
});
require __DIR__ . '/auth.php';
