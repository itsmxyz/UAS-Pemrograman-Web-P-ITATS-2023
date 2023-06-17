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
            $table->foreignId('siswa_id')->constrained('siswa', 'id_siswa');
            $table->enum('absensi_1', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_2', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_3', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_4', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_5', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_6', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_7', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_8', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_9', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_10', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_11', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_12', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_13', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
            $table->enum('absensi_14', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Kosong'])->default('Kosong');
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
