<?php

    namespace App\Providers;


    use Illuminate\Foundation\Vite;
    use Illuminate\Support\ServiceProvider;

    class ViewServiceProvider extends ServiceProvider
    {
        /**
         * Register services.
         *
         * @return void
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap services.
         *
         * @return void
         */
        public function boot(): void
        {
            Vite::macro('image', fn($asset) => $this->asset("resources/images/$asset"));
        }
    }
