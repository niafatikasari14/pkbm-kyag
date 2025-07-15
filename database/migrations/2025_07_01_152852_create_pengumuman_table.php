<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id('id_pengumuman');
            $table->string('judul_pengumuman');
            $table->date('tanggal_pengumuman'); // disesuaikan dengan DatePicker
            $table->text('isi_pengumuman'); // isi bisa berupa teks + HTML dari RichEditor
            $table->string('file_pengumuman')->nullable(); // file lampiran (opsional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
