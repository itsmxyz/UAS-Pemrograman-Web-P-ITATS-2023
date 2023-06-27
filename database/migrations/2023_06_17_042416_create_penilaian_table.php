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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian');
            $table->foreignId('mapel_id')->constrained('mata_pelajaran', 'id_mapel')->onDelete('cascade');
            $table->foreignId('siswa_nis')->constrained('siswa', 'nis_siswa')->onDelete('cascade');
            for ($i = 1; $i <= 8; $i++) {
                $table->integer('penilaian'.$i)->default(0);
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
