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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 10)->nullable();
            $table->string('nama', 100);
            $table->string('alamat', 100)->nullable();
            $table->string('prodi', 100)->nullable();
            $table->string('jenjang', 100)->nullable();
            $table->string('gelar', 100)->nullable();
            $table->string('tahun_masuk', 100)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
