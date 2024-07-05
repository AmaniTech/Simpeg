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
        Schema::create('penelitian_luaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->references('id')->on('dosen');
            $table->string('penelitian');
            $table->date('tanggal')->nullable();
            $table->string('bukti_penelitian')->nullable();
            $table->string('surat_tugas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
