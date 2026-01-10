<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1) Drop existing foreign key constraint
        Schema::table('transaksi', function (Blueprint $table) {
            // drop by column
            $table->dropForeign(['id_pelanggan']);
        });

        // 2) Modify column to be nullable unsigned big integer
        // Use direct statement to avoid requiring doctrine/dbal
        DB::statement('ALTER TABLE `transaksi` MODIFY `id_pelanggan` BIGINT UNSIGNED NULL');

        // 3) Recreate foreign key with ON DELETE SET NULL (nullOnDelete)
        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_pelanggan')
                ->references('id_pelanggan')
                ->on('pelanggan')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the modified foreign key
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign(['id_pelanggan']);
        });

        // Revert column to NOT NULL unsigned big int
        DB::statement('ALTER TABLE `transaksi` MODIFY `id_pelanggan` BIGINT UNSIGNED NOT NULL');

        // Recreate original foreign key with cascade on delete
        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_pelanggan')
                ->references('id_pelanggan')
                ->on('pelanggan')
                ->onDelete('cascade');
        });
    }
};
