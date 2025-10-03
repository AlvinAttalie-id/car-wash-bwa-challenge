<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'license_plate' => $this->license_plate,
            'brand'         => $this->brand,
            'model'         => $this->model,
            'color'         => $this->color,
            'cleaning_status' => $this->cleaning_status,
        ];
    }
}
