<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->total_price,
            'delivery_time' => $this->delivery_time,
            'user' => UserResource::make($this->user),
            'vendor' => VendorResource::make($this->vendor)
        ];
    }
}
