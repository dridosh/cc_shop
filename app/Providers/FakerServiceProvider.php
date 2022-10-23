<?php

    declare(strict_types=1);

    namespace App\Providers;

    use App\Faker\FakerImageProvider;
    use Faker\Factory;
    use Faker\Generator;
    use Illuminate\Support\ServiceProvider;


    class FakerServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register(): void
        {
            $this->app->singleton(Generator::class, function () {
                $faker = Factory::create();
                $faker->addProvider(new FakerImageProvider($faker));
                return $faker;
            });
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot(): void
        {
        }
    }

