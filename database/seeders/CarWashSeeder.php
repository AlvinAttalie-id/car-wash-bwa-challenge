<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarWash;

class CarWashSeeder extends Seeder
{
    public function run(): void
    {
        $carWashes = [
            [
                'type_id' => 1,
                'name' => 'Premium Wash',
                'description' => 'Cuci mobil lengkap dengan wax',
                'price' => 75000,
                'thumbnail' => 'wash1.jpg',
            ],
            [
                'type_id' => 1,
                'name' => 'Express Wash',
                'description' => 'Cuci cepat 15 menit',
                'price' => 40000,
                'thumbnail' => 'wash2.jpg',
            ],
            [
                'type_id' => 2,
                'name' => 'Motor Wash',
                'description' => 'Cuci motor bersih dan kilap',
                'price' => 15000,
                'thumbnail' => 'wash3.jpg',
            ],
        ];

        foreach ($carWashes as $wash) {
            CarWash::create($wash);
        }
    }
}
