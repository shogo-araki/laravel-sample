<?php

namespace App\Listeners;

use App\Events\PublishProcessor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageSubscriber
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\PublishProcessor  $event
     * @return void
     */
    public function handle(PublishProcessor $event)
    {
        var_dump($event->getInt());
    }
}
