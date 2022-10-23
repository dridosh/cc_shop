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
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot(): void
        {
            /* Configuring Eloquent Strictness
             https://laravel.com/docs/9.x/eloquent#configuring-eloquent-strictness
            */

            /*            Отключение ленивой загрузки на dev системе, для выявления преблемы N+1 на ранних стадиях
                    https://laravel-news.com/disable-eloquent-lazy-loading-during-development*/

            Model::preventLazyLoading(!app()->isProduction());

            /*      Генерировать исключение при попытке заполнить незаполняемый атрибут
            */
            Model::preventSilentlyDiscardingAttributes(!app()->isProduction());
            /*
                        генерировать исключение, если вы попытаетесь получить доступ к атрибуту модели, когда этот атрибут фактически не был извлечен из базы данных или когда атрибут не существует.*/


            Model::preventAccessingMissingAttributes(!$this->app->isProduction());

            /*            Включение Eloquent «Строгого режима»
                Для удобства вы можете включить все три описанных выше метода, просто вызвав shouldBeStrictметод:

                Model::shouldBeStrict(! $this->app->isProduction());

             */

            /*
              Monitoring Cumulative Query Time
              https://laravel.com/docs/9.x/database#monitoring-cumulative-query-time

              */

//            метод имеет проблемы - если его использовать в очетредях, то при срабатывании возникает бесконечный цикл
            DB::whenQueryingForLongerThan(900, static function (Connection $connection) {
                // Notify development team...
                logger()
                    ?->channel('telegram')
                    ->debug('whenQueryingForLongerThan:'.$connection->totalQueryDuration());
            }
            );

            DB::listen(static function ($query) {
                if ($query->time > 100) //           dump($query->time, $query->sql, $query->bindings);
                {
                    logger()
                        ?->channel('telegram')
                        ->debug('query longer then 1s:'.$query->sql, [$query->bindings, $query->time]);
                }
            });


            $kernel = app(Kernel::class);
            $kernel->whenRequestLifecycleIsLongerThan(
                CarbonInterval::seconds(4),
                function () {
                    logger()
                        ?->channel('telegram')
                        ->debug('whenRequestLifecycleIsLongerThan:'.request()?->url());
                }
            );
        }
    }
