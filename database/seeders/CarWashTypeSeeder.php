<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarWashType;

class CarWashTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Mobil', 'description' => 'Cuci mobil berbagai ukuran'],
            ['name' => 'Motor', 'description' => 'Cuci motor cepat dan bersih'],
            ['name' => 'SUV/MPV', 'description' => 'Cuci mobil besar dan keluarga'],
        ];

        foreach ($types as $type) {
            CarWashType::create($type);
        }
    }
}
