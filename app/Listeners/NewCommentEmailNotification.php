<?php

    namespace App\Listeners;


    use App\Events\CommentCreated;
    use Illuminate\Contracts\Queue\ShouldQueue;

    class NewCommentEmailNotification implements ShouldQueue
    {
        public function handle(CommentCreated $event): void
        {
            // SendEmailMessage($event->comment);
        }
    }
