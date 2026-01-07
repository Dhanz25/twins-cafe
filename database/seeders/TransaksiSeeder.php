<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'tanggal' => '2024-06-01',
                'id_pelanggan' => 1,
                'no_meja' => 5,
                'total' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2024-06-02',
                'id_pelanggan' => 2,
                'no_meja' => 3,
                'total' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
