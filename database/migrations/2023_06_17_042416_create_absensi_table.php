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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->foreignId('mapel_id')->constrained('mata_pelajaran', 'id_mapel')->onDelete('cascade');
            $table->foreignId('siswa_nis')->constrained('siswa', 'nis_siswa')->onDelete('cascade');
            for ($i = 1; $i <= 20; $i++) {
                $table->enum('absensi'.$i, ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
