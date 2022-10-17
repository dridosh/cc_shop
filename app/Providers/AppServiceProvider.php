<?php

    namespace App\Providers;

    use App\Http\Kernel;
    use Carbon\CarbonInterval;
    use Illuminate\Database\Connection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\ServiceProvider;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot(): void
        {
            Model::preventLazyLoading(!app()->isProduction());
            Model::preventSilentlyDiscardingAttributes(!app()->isProduction());

            DB::whenQueryingForLongerThan(
                500,
                static function (Connection $connection) {
                    // Notify development team...
                    //TODO сделать логирование в телеграм

                }
            );
            $kernel = app(Kernel::class);
            $kernel->whenRequestLifecycleIsLongerThan(
                CarbonInterval::seconds(4),
                function () {
                }
            );
        }
    }
