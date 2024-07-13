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
        Schema::create('rpenelitian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->references('id')->on('dosen');
            $table->string('judul_penelitian');
            $table->string('penulis');
            $table->enum('status_penulis', ['peneliti', 'anggota']);
            $table->string('peran_penulis');
            $table->boolean('status_korespondensi')->default(0);
            $table->string('tahun_penelitian');
            $table->string('bukti_penelitian');
            $table->string('penerbit')->nullable();
            $table->string('sinta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpenelitian');
    }
};
