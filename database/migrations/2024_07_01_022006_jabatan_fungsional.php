<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('jabatan_fungsional', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan')->nullable();
            $table->string('kepangkatan')->nullable();
            $table->string('golongan')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('tgl_sertifikasi')->nullable();
            $table->foreignId('dosen_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
    }
};
