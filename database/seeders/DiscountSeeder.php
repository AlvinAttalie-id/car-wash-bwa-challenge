<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        $discounts = [
            [
                'code' => 'DISC10',
                'description' => 'Diskon 10% semua layanan',
                'percentage' => 10,
                'valid_from' => now(),
                'valid_until' => now()->addMonth(),
            ],
            [
                'code' => 'DISC20',
                'description' => 'Diskon 20% khusus Premium Wash',
                'percentage' => 20,
                'valid_from' => now(),
                'valid_until' => now()->addDays(15),
            ],
        ];

        foreach ($discounts as $disc) {
            Discount::create($disc);
        }
    }
}
