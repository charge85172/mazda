<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'created_at' => Carbon::now()->subMonths(1), // Al lang lid
        ]);

        // 2. Old User (Mag auto's toevoegen)
        User::factory()->create([
            'name' => 'Old User',
            'email' => 'old@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now()->subDays(7), // 7 dagen oud
        ]);

        // 3. New User (Mag GEEN auto's toevoegen)
        User::factory()->create([
            'name' => 'New User',
            'email' => 'new@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now(), // Vandaag aangemaakt
        ]);

        // 4. Seed Cars (Gebruik de bestaande CarSeeder)
        $this->call([
            CarSeeder::class,
        ]);
    }
}
