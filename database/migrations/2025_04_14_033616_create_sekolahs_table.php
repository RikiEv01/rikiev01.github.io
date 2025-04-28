<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('akreditasi', ['A', 'B', 'C', 'Belum Terakreditasi']);
            $table->integer('ekskul');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->integer('spp');
            $table->enum('fasilitas', ['Sangat Lengkap', 'Lengkap', 'Cukup Lengkap', 'Tidak Lengkap']);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};
