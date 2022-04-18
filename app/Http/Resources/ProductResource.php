<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Class ProductResource
     *
     * @package App\Http\Resources
     *
     * @mixin ProductResource
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
}
