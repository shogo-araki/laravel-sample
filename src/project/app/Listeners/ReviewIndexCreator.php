<?php

namespace App\Listeners;

use App\Events\ReviewRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReviewIndexCreator
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ReviewRegistered  $event
     * @return void
     */
    public function handle(ReviewRegistered $event)
    {
        //
    }
}
