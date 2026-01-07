<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Manual Brew', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Kopi Susu', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Kopi Susu Special', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Tanpa Ampas', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Bukan Kopi', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('kategori')->insert($kategori);
    }
}
