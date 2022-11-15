<?php

    declare(strict_types=1);

    namespace App\Providers;

    use App\Services\LogicTasks\MergeInterval;
    use Illuminate\Support\ServiceProvider;

    class IntervalMergeServiceProvider extends ServiceProvider
    {
        public function register(): void
        {
            $this->app->bind('mI', MergeInterval::class);
        }


    }