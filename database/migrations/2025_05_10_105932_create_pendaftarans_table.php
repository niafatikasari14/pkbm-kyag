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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->string('alur_pendaftaran'); //foto
            $table->string('brosur'); //foto
            $table->text('syarat_pendaftaran');
            $table->string('link_paketA'); //linkgform
            $table->string('link_paketB'); //linkgform
            $table->string('link_paketC'); //linkgform
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
