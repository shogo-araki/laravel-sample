<?php

namespace App\Providers;

use App\Events\PublishProcessor;
use App\Listeners\MessageQueueSubscriber;
use App\Listeners\MessageSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    // デフォルトで用意されているlistenプロパティで指定する場合
    protected $listen = [
        PublishProcessor::class => [
            // MessageSubscriber::class,
            MessageQueueSubscriber::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // facade
        // Event::listen(
        //     PublishProcessor::class,
        //     MessageSubscriber::class,
        // );

        // DI container
        // $this->app['events']->listen(
        //     PublishProcessor::class,
        //     MessageSubscriber::class,
        // );
    }
}
