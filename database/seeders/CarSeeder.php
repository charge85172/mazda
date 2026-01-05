<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Try to find the 'old' user we created in DatabaseSeeder, or fallback to the first user
        $user = User::where('email', 'old@example.com')->first() ?? User::first();

        if (!$user) {
            // Should not happen if DatabaseSeeder runs first, but just in case
            return;
        }

        // Create some cars for the user
        $carsData = [
            [
                'make' => 'Mazda',
                'model' => 'MX-5',
                'year' => 2020,
                'generation' => 'ND',
                'version' => '2.0 SkyActiv-G',
                'is_active' => true,
            ],
            [
                'make' => 'Mazda',
                'model' => 'RX-7',
                'year' => 1995,
                'generation' => 'FD',
                'version' => 'Spirit R',
                'is_active' => true,
            ],
            [
                'make' => 'Mazda',
                'model' => '3',
                'year' => 2021,
                'generation' => 'BP',
                'version' => 'e-SkyActiv X',
                'is_active' => false,
            ],
        ];

        foreach ($carsData as $carData) {
            $carData['user_id'] = $user->id;
            Car::create($carData);
        }
    }
}
