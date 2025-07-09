<?php

use App\Http\Controllers\web\Merchant\OrderItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-type:merchant'])->group(function () {

    Route::get('order_items', [OrderItemController::class, 'index']);

});
