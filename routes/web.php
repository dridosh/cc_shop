<?php


    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\HomeController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', HomeController::class)->name('home');

    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'signIn')->name('signIn');

        Route::get('/sign-up', 'signUp')->name('signUp');
        Route::post('/sign-up', 'store')->name('store');

        Route::delete('/logout', 'logOut')->name('logOut');


        Route::get('/forgot-password', 'forgotPassword')->name('forgotPassword');
        Route::get('/reset-password', 'resetPassword')->name('resetPassword');
    });
