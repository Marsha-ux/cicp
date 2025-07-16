<?php

use App\Http\Controllers\web\Merchant\OrderItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-type:merchant'])->group(function () {

    Route::get('order_items', [OrderItemController::class, 'index'])->name('merchant.order_items');
    Route::post('order_items/{orderItem}/complete', [OrderItemController::class, 'completeOrderItem'])->name('merchant.order_items.complete');

});
