<?php

    declare(strict_types=1);

    namespace App\Logging\Telegram;

    use App\Services\Telegram\TelegramBotApi;
    use Monolog\Handler\AbstractProcessingHandler;
    use Monolog\Logger;

    /*  http://seldaek.github.io/monolog/doc/04-extending.html*/

    class TelegramLoggerHandler extends AbstractProcessingHandler
    {
        private string $token;
        private int $chat_id;

        public function __construct($config)
        {
            $level = Logger::toMonologLevel($config['level']);
            parent::__construct($level);
            $this->token = $config['token'];
            $this->chat_id = (int) $config['chat_id'];
        }

        protected function write(array $record): void
        {
            //  dd($record['formatted']);
            TelegramBotApi::sendMessage(
                $this->token,
                $this->chat_id,
                $record['formatted']);
        }
    }
