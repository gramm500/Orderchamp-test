<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateDiscount
{

    /**
     * Handle the event.
     *
     * @param OrderCreated $event
     * @return void
     */
    public function handle(OrderCreated $event): void
    {
        /** @var User $user */
        $user = $event->order->user;
        $discount = $user->discount;
        if ($discount === null) {
            Discount::create([
                'user_id' => $user->id,
                'amount' => 5,
            ]);
        }
    }
}
