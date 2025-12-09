<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('home');
    Route::get('/inc/{id}', [ShopController::class, 'increment'])->name('shop.inc');
    Route::get('/dec/{id}', [ShopController::class, 'decrement'])->name('shop.dec');

    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
    Route::get('/purchase', [BasketController::class, 'purchase'])->name('basket.purchase');
    Route::get('/success', [BasketController::class, 'success'])->name('basket.success');
});
