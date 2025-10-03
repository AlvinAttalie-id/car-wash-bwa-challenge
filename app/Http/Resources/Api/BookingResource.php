<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'booking_code'  => $this->booking_code,
            'booking_date'  => $this->booking_date?->format('Y-m-d'),
            'booking_time'  => $this->booking_time?->format('H:i'),
            'status'        => $this->status,

            // Relasi
            'user'     => new UserResource($this->whenLoaded('user')),
            'car'      => new CarResource($this->whenLoaded('car')),
            'car_wash' => new CarWashResource($this->whenLoaded('carWash')),
            'discount' => new DiscountResource($this->whenLoaded('discount')),
            'payment'  => new PaymentResource($this->whenLoaded('payment')),
            'review'   => new ReviewResource($this->whenLoaded('review')),

            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
