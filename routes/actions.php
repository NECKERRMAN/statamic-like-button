<?php
use Illuminate\Support\Facades\Route;
use Neckerrman\Like\Http\Controllers\LikeController;

Route::name('like.')->group(function () {
    Route::post('/store', [LikeController::class, 'store'])->name('store');
});
