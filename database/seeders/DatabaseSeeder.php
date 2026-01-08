<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'level' => 'user',
        ]);

        // Tambah user admin dengan password
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('password'), // atau Hash::make('password')
        ]);
    }
}
