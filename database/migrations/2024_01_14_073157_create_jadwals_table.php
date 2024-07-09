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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('pertemuan');
            $table->string('kelas')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('jam')->nullable();
            $table->text('materi_dosen')->nullable();
            $table->text('materi_mhs')->nullable();
            $table->integer('jml_mhs')->nullable();
            $table->integer('jml_mhs_masuk')->nullable();
            $table->integer('gaji')->nullable();
            $table->foreignId('matkul_id')->constrained('matkuls')->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained('dosen')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
