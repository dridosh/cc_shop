<?php

    declare(strict_types=1);

    namespace App\Jobs;

    use Illuminate\Contracts\Mail\Mailable;
    use Illuminate\Contracts\Queue\Factory as Queue;

    class ForgotPassword implements Mailable
    {

        /**
         * ForgotPassword constructor.
         * @param $password
         */
        public function __construct($password)
        {
        }

        public function send($mailer)
        {
            // TODO: Implement send() method.
        }

        public function queue(Queue $queue)
        {
            // TODO: Implement queue() method.
        }

        public function later($delay, Queue $queue)
        {
            // TODO: Implement later() method.
        }

        public function cc($address, $name = null)
        {
            // TODO: Implement cc() method.
        }

        public function bcc($address, $name = null)
        {
            // TODO: Implement bcc() method.
        }

        public function to($address, $name = null)
        {
            // TODO: Implement to() method.
        }

        public function locale($locale)
        {
            // TODO: Implement locale() method.
        }

        public function mailer($mailer)
        {
            // TODO: Implement mailer() method.
        }
    }