<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Booking;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $booking = Booking::first();

        Payment::create([
            'booking_id' => $booking->id,
            'amount' => 67500, // setelah diskon 10%
            'method' => 'midtrans',
            'status' => 'paid',
            'transaction_date' => now(),
        ]);
    }
}
