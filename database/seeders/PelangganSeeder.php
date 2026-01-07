<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelanggan')->insert([
            [
                'nama_pelanggan' => 'Akbar Priyanto',
                'alamat' => 'Teluk',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggan' => 'Abi Rizki H',
                'alamat' => 'Karang Cengis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggan' => 'Aditya Saputra D',
                'alamat' => 'Kecitran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggan' => 'Bathin Daffa R',
                'alamat' => 'Kalikabong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggan' => 'Faizurrohim R',
                'alamat' => 'Kramat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
