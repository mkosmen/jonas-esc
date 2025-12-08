<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('home');
    Route::get('/inc/{id}', [ShopController::class, 'increment'])->name('shop.inc');
    Route::get('/dec/{id}', [ShopController::class, 'decrement'])->name('shop.dec');
});
