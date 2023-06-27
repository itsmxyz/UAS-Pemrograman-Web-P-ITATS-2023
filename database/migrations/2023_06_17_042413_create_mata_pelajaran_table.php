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
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id('id_mapel')->startingValue(1000);
            $table->string('kode_mapel')->unique();
            $table->string('nama_mapel');
            $table->string('semester');
            $table->integer('tahun_ajaran');
            $table->foreignId('sensei_id')->constrained('sensei', 'id_sensei')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajaran');
    }
};
