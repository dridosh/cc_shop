<?php

    namespace App\Console\Commands;

    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Storage;


    class RefreshCommand extends Command
    {

        protected $signature = 'cc_shop:refresh';

        protected $description = 'Refresh database';

        public function handle(): int
        {
            if (app()->isProduction()) {
                return self::FAILURE;
            }
//            Storage::deleteDirectory('images/products');
//            Storage::makeDirectory('images/products');
            File::cleanDirectory(Storage::path('images/products'));
            $this->call('migrate:fresh', [
                '--seed' => true,
            ]);

            return self::SUCCESS;
        }
    }
