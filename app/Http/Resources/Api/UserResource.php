<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'phone'      => $this->phone,
            'birth_date' => $this->birth_date?->format('Y-m-d'),
            'address'    => $this->address,

            // Roles dari Spatie
            'roles'      => $this->whenLoaded('roles', fn() => $this->getRoleNames()),

            // Optional relasi
            'cars'       => CarResource::collection($this->whenLoaded('cars')),
            'bookings'   => BookingResource::collection($this->whenLoaded('bookings')),
            'reviews'    => ReviewResource::collection($this->whenLoaded('reviews')),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
