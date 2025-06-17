<?php


use Illuminate\Support\Facades\Route;

    Route::prefix('auth')->controller(\App\Http\Controllers\api\Merchant\AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
    });
Route::middleware('user-type:merchant')->group(function () {
});
