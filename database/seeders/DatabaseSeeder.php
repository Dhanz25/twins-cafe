<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Buat user biasa untuk testing
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'level' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}
