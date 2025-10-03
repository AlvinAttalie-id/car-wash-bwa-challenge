<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\User;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'john@example.com')->first();

        Car::create([
            'user_id' => $user->id,
            'license_plate' => 'DA 1234 AB',
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'color' => 'Black',
            'cleaning_status' => 'waiting',
        ]);

        Car::create([
            'user_id' => $user->id,
            'license_plate' => 'DA 5678 CD',
            'brand' => 'Honda',
            'model' => 'Civic',
            'color' => 'Red',
            'cleaning_status' => 'in_progress',
        ]);

        Car::create([
            'user_id' => $user->id,
            'license_plate' => 'DA 9999 ZZ',
            'brand' => 'Suzuki',
            'model' => 'Ertiga',
            'color' => 'Silver',
            'cleaning_status' => 'done',
        ]);
    }
}
