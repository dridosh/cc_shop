<?php

namespace App\Providers;

use App\Events\CommentCreated;
use App\Listeners\NewCommentEmailNotification;
use App\Listeners\SendEmailNewUserListener;
use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class     => [
            // SendEmailVerificationNotification::class,
            SendEmailNewUserListener::class,
        ],
        CommentCreated::class => [
            NewCommentEmailNotification::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        Product::observe(new ProductObserver());
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
