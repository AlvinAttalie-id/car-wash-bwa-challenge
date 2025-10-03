<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarWashResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'carwash_code' => $this->carwash_code,
            'name'         => $this->name,
            'slug'         => $this->slug,
            'description'  => $this->description,
            'price'        => $this->price,
            'thumbnail'    => $this->thumbnail_url,
            'type'         => $this->whenLoaded('type', fn() => [
                'id'   => $this->type->id,
                'name' => $this->type->name,
                'slug' => $this->type->slug,
            ]),
        ];
    }
}
