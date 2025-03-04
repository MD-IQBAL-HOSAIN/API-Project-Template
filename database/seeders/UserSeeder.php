<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!\App\Models\User::where('email', 'admin@gmail.com')->exists()) {
            \App\Models\User::create([
                'id' => 1,
                'name' => 'Mr. Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
            ]);
        }

        if (!\App\Models\User::where('email', 'user@gmail.com')->exists()) {
            \App\Models\User::create([
                'id' => 2,
                'name' => 'Mr. User',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
            ]);
        }
    }
}
