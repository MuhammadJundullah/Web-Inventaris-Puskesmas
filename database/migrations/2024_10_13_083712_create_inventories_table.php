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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('merek')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('tempat_barang')->nullable();
            $table->string('editor')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
