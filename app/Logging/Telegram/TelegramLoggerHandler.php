<?php

    declare(strict_types=1);

    namespace App\Logging\Telegram;

    use Monolog\Handler\AbstractProcessingHandler;
    use Monolog\Logger;

    /*  http://seldaek.github.io/monolog/doc/04-extending.html*/

    class TelegramLoggerHandler extends AbstractProcessingHandler
    {
        public function __construct($config)
        {
            $level = Logger::toMonologLevel($config['level']);
            parent::__construct($level);
        }

        protected function write(array $record): void
        {
            //  dd($record['formatted']);
        }
    }
