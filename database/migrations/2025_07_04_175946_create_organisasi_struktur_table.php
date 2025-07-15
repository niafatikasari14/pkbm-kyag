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
        Schema::create('organisasi_struktur', function (Blueprint $table) {
            $table->id('id_struktur');
            $table->integer('tahun_awal');
            $table->integer('tahun_akhir');
            $table->text('struktur_organisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasi_struktur');
    }
};
