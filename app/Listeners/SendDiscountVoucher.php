<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\OrderCreated;

class SendDiscountVoucher
{
    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $order = $event->order;
        \Notification::send($order->user, new \App\Notifications\OrderCreated());
    }
}
