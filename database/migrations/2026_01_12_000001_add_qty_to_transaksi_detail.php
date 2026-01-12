<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add nullable qty column, copy existing `jumlah` values into it, then try to make it NOT NULL
        Schema::table('transaksi_detail', function (Blueprint $table) {
            if (!Schema::hasColumn('transaksi_detail', 'qty')) {
                $table->integer('qty')->nullable()->after('jumlah');
            }
        });

        // Copy existing values from jumlah to qty for existing rows
        DB::table('transaksi_detail')->whereNull('qty')->update(['qty' => DB::raw('jumlah')]);

        // Attempt to set NOT NULL (works on MySQL). If DBAL/driver doesn't allow, ignore the exception.
        try {
            DB::statement('ALTER TABLE transaksi_detail MODIFY qty INT NOT NULL');
        } catch (\Throwable $e) {
            // ignore if ALTER MODIFY fails (e.g., different DB driver or missing permissions)
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_detail', function (Blueprint $table) {
            if (Schema::hasColumn('transaksi_detail', 'qty')) {
                $table->dropColumn('qty');
            }
        });
    }
};