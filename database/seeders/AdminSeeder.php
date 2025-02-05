<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the admin user already exists
        if (!User::where('email', 'atbi@bsu.edu.ph')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'atbi@bsu.edu.ph',
                'password' => Hash::make('ATBI@2025'), // Make sure to use a strong password
                'role' => 'admin', // Set the role to admin
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
