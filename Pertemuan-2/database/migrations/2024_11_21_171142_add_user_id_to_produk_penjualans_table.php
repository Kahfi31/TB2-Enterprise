<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produk_penjualans', function (Blueprint $table) {
            // Menambahkan kolom users_id yang dapat bernilai NULL
            $table->unsignedBigInteger('users_id')->nullable();

            // Menambahkan foreign key dengan onDelete cascade
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk_penjualans', function (Blueprint $table) {
            // Menghapus foreign key dan kolom users_id
            $table->dropForeign(['users_id']);
            $table->dropColumn('users_id');
        });
    }
};
