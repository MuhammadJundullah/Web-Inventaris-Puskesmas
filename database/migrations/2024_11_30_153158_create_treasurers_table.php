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
        Schema::create('treasurers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai')->nullable();
            $table->string('id_pegawai')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('kegiatan')->nullable();
            $table->integer('dana_yang_digunakan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treasurers');
    }
};
