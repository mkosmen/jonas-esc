<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('home');
});
