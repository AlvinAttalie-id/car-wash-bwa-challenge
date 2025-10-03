<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use App\Models\CarWash;
use App\Models\Discount;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'john@example.com')->first();
        $car = Car::first();
        $carWash = CarWash::first();
        $discount = Discount::first();

        Booking::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'car_wash_id' => $carWash->id,
            'discount_id' => $discount->id,
            'booking_date' => now()->toDateString(),
            'booking_time' => now()->format('H:i'),
            'status' => 'pending',
        ]);
    }
}
