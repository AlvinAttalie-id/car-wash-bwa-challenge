<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Booking;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'john@example.com')->first();
        $booking = Booking::first();

        Review::create([
            'user_id' => $user->id,
            'booking_id' => $booking->id,
            'rating' => 5,
            'comment' => 'Pelayanan cepat dan hasil bersih!',
        ]);
    }
}
