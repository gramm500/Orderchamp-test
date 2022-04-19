<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Models\User;
use App\Models\Discount;
use App\Events\OrderCreated;

class CreateDiscount
{
    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        /** @var User $user */
        $user = $event->order->user;
        $discount = $user->discount;
        if (null === $discount) {
            Discount::create([
                'user_id' => $user->id,
                'amount'  => 5,
            ]);
        }
    }
}
