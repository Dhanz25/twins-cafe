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
        // Add nullable qty column, copy existing jumlah values into it
        Schema::table('detail_transaksi', function (Blueprint $table) {
            if (!Schema::hasColumn('detail_transaksi', 'qty')) {
                $table->integer('qty')->nullable()->after('jumlah');
            }
        });

        // Copy existing values from jumlah to qty for existing rows
        DB::table('detail_transaksi')->whereNull('qty')->update(['qty' => DB::raw('jumlah')]);

        // Attempt to set NOT NULL using cross-compatible schema builder
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->integer('qty')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            if (Schema::hasColumn('detail_transaksi', 'qty')) {
                $table->dropColumn('qty');
            }
        });
    }
};