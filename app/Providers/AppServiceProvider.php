<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\PDO\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PhpParser\Lexer\TokenEmulator\FlexibleDocStringEmulator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::preventLazyLoading(!app()->isProduction());
        Model::preventSilentlyDiscardingAttributes(!app()->isProduction());

//        DB::whenQueryingForLongerThan(500, function (Connection $connection) {
//            // Notify development team...
//            //TODO сделать логирование в телеграм
//
//        });
//        //TODO
    }
}
