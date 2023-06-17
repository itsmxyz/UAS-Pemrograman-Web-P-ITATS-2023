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
            $table->foreignId('siswa_id')->constrained('siswa', 'id_siswa');
            $table->integer('penilaian_1')->default(0);
            $table->integer('penilaian_2')->default(0);
            $table->integer('penilaian_3')->default(0);
            $table->integer('penilaian_4')->default(0);
            $table->integer('penilaian_5')->default(0);
            $table->integer('penilaian_6')->default(0);
            $table->integer('penilaian_7')->default(0);
            $table->integer('penilaian_8')->default(0);
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
