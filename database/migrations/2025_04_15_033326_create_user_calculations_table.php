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
        Schema::create('user_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna');
            $table->string('lokasi'); // format "lat,lng"
            $table->json('bobot_kriteria');
            $table->json('hasil_perhitungan'); // berisi array hasil ranking
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_calculations');
    }
};
