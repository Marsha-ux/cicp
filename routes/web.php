<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('merchant')->group(function () {
    require __DIR__ . '/web/merchant.php';
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::prefix('google')->group(function () {
    Route::get('auth/redirect', function () {
        return Socialite::driver('google')->redirect();
    });
    Route::get('auth/callback', function () {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make(Str::random(10)),
                'google_user_id' => $googleUser->id,
            ]);
        }

        $accessToken = $user->createToken('authToken')->accessToken;

        return [
            'user' => $user,
            'access_token' => $accessToken
        ];
    });
});
