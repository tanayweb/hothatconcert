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
    Route::post('/delete_po_detail', [POController::class, 'delete_po_detail'])->name('delete_po_detail');
    Route::get('/all_po_list', [POController::class, 'all_po_list'])->name('all_po_list');
    Route::get('file-export/{id}', [POController::class, 'fileExport'])->name('file-export');
});
Route::get('/clear-cache', function () {
    \Artisan::call('cache:clear');
    dd("Cache Clear All");
});
require __DIR__ . '/auth.php';
