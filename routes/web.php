<?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        logger()?->channel('telegram')->debug('Hello World!!!');
        logger()?->channel('telegram')->info('Hello World!!!');
        logger()?->channel('telegram')->alert('Hello World!!!');
        logger()?->channel('telegram')->critical('Hello World!!!');
        logger()?->channel('telegram')->emergency('Hello World!!!');
        logger()?->channel('telegram')->error('Hello World!!!');
        logger()?->info('просто лог');
        return view('welcome');
    }
    );
