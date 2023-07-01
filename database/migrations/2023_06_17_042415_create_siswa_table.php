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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('nis_siswa')->startingValue(40110);
            $table->string('nama_siswa');
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->string('kelas_id')->default('00000');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
