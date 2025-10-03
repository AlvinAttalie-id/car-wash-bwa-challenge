<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'amount'          => $this->amount,
            'method'          => $this->method,
            'status'          => $this->status,
            'transaction_date' => $this->transaction_date?->format('Y-m-d H:i'),
        ];
    }
}
