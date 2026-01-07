<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_transaksi')->insert([
            [
                'id_transaksi' => 1,
                'id_produk' => 1,
                'jumlah' => 2,
                'subtotal' => 24000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 1,
                'id_produk' => 5,
                'jumlah' => 1,
                'subtotal' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 2,
                'id_produk' => 2,
                'jumlah' => 3,
                'subtotal' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 2,
                'id_produk' => 6,
                'jumlah' => 2,
                'subtotal' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
