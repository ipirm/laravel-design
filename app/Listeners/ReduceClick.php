<?php

namespace App\Listeners;
use Illuminate\Support\Facades\DB;
use Log;
use App\Events\AuctionUserWasOutbidded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReduceClick
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
     * @param  AuctionUserWasOutbidded  $event
     * @return void
     */
    public function handle(AuctionUserWasOutbidded $event)
    {
    }
}
