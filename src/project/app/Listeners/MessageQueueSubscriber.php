<?php

namespace App\Listeners;

use App\Events\PublishProcessor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class MessageQueueSubscriber implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  \App\Events\PublishProcessor  $event
     * @return void
     */
    public function handle(PublishProcessor $event)
    {
        Log::info($event->getInt());
    }
}
