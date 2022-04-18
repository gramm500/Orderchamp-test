<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Class CartResource
     *
     * @package App\Http\Resources
     *
     * @mixin CartResource
     */
    public function toArray($request): array
    {
        return [
            'user' => $this->user->name,
            'product' => $this->product->name,
        ];
    }
}
