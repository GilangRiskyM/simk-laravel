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
        Schema::table('keluar', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bbm')->nullable(false)->after('id');
            $table->foreign('id_bbm')->references('id')->on('stok_bbm')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keluar', function (Blueprint $table) {
            $table->dropForeign(['id_bbm']);
            $table->dropColumn('id_bbm');
        });
    }
};
