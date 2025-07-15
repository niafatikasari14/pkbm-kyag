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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id('id_berita');
            $table->string('judul_berita');
            $table->string('slug')->unique()->after('judul_berita');
            $table->datetime('tanggal_berita')->useCurrent();
            $table->text('isi_berita');
            $table->string('gambar_berita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
        Schema::table('beritas', function (Blueprint $table) {
    
        });    }
};
