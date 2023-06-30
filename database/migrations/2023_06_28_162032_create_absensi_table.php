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
            $table->id();
            $table->unsignedBigInteger('worker_id')->required();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('restrict');
            $table->date('tanggal')->required();
            $table->time('jam_absen')->required();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('jadwal_id')->required();
            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('restrict');
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
