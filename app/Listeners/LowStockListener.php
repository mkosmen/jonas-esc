<?php

namespace App\Listeners;

use App\Events\CheckLowStock;
use App\Mail\LowStock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class LowStockListener implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(CheckLowStock $event): void
    {
        Mail::to(config('mail.from.address'))->send(new LowStock($event->products));
    }

    public function shouldQueue(CheckLowStock $event): bool
    {
        return count($event->products) > 0;
    }
}
