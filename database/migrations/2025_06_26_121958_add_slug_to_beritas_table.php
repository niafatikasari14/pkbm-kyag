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
    if (!Schema::hasColumn('beritas', 'slug')) {
        Schema::table('beritas', function (Blueprint $table) {
            $table->string('slug')->unique()->after('judul_berita');
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    if (Schema::hasColumn('beritas', 'slug')) {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
};
