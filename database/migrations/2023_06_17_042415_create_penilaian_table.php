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
            $table->string('kelas_kode');
            $table->timestamps();

            for ($i = 1; $i <= 8; $i++) {
                $table->integer('penilaian'.$i)->default(0);
            }

            $table->foreignId('siswa_nis')->constrained('siswa', 'nis_siswa')->onDelete('cascade');
            $table->foreign('kelas_kode')->references('kode_kelas')->on('kelas')->onDelete('cascade');
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
