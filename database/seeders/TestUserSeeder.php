<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // Expliciet de rol \'user\' meegeven
        ]);
    }
}
