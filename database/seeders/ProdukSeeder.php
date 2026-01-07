<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Vietnam Drip Arabika Ice',
                'harga' => 12000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Vietnam Drip Arabika Hot',
                'harga' => 10000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Vietnam Drip Robusta Ice',
                'harga' => 10000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Vietnam Drip Robusta Hot',
                'harga' => 10000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Tubruk Arabika Ice',
                'harga' => 10000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Tubruk Arabika Hot',
                'harga' => 10000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Tubruk Robusta Ice',
                'harga' => 8000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Tubruk Robusta Hot',
                'harga' => 8000,
                'stok' => 50,
                'id_kategori' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kopi Susu Gula Aren Ice',
                'harga' => 15000,
                'stok' => 50,
                'id_kategori' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kopi Susu Gula Aren Hot',
                'harga' => 13000,
                'stok' => 50,
                'id_kategori' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kopi Susu Full Cream Ice',
                'harga' => 14000,
                'stok' => 50,
                'id_kategori' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kopi Susu Full Cream Hot',
                'harga' => 12000,
                'stok' => 50,
                'id_kategori' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Americano Ice',
                'harga' => 18000,
                'stok' => 50,
                'id_kategori' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Americano Hot',
                'harga' => 16000,
                'stok' => 50,
                'id_kategori' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Matcha Ice',
                'harga' => 20000,
                'stok' => 50,
                'id_kategori' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Matcha Hot',
                'harga' => 180000,
                'stok' => 50,
                'id_kategori' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
