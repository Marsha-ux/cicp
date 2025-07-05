<?php
use App\Http\Controllers\api\Customer\AuthController;
use App\Http\Controllers\api\Customer\CartController;
use App\Http\Controllers\api\Customer\CartItemController;
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
    Route::get('cart', [CartController::class, 'myCart']);
    Route::apiResource('cart_item', CartItemController::class);


    Route::post('checkout', [OrderController::class, 'checkout']);

    // search products




    // add to wishlist

    // add card

    // checkout (transfor the card into order)

    // pay the order


});
