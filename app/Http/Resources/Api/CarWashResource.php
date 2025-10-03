<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarWashResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'carwash_code'  => $this->carwash_code,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'description'   => $this->description,
            'price'         => $this->price,
            'type'          => $this->whenLoaded('type', fn() => $this->type->name),
        ];
    }
}
