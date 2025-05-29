<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        // Create a test user
        User::firstOrCreate(
            ['email' => 'test@cheeriostudios.com'],
            [
                'name' => 'Test User',
                'email' => 'test@cheeriostudios.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );// Create an admin user
        User::firstOrCreate(
            ['email' => 'admin@cheeriostudios.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@cheeriostudios.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
