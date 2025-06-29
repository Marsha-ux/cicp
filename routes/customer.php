<?php
use App\Http\Controllers\api\Customer\AuthController;
use App\Http\Controllers\api\Customer\HomePageController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    });
Route::middleware(['auth:sanctum', 'user-type:customer'])->group(function () {

    // Route::get('product', [ProductController::class, 'get']);

    // broswe products in home page

    Route::get('home_page_data', HomePageController::class);
    Route::apiResource('cart_item', \App\Http\Controllers\api\Customer\CartItemController::class);

    // search products




    // add to wishlist

    // add card

    // checkout (transfor the card into order)

    // pay the order


});
