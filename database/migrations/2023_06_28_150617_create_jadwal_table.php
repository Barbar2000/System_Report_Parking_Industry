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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('available_jadwal_id')->required();
            $table->foreign('available_jadwal_id')->references('id')->on('available_jadwal')->onDelete('cascade');
            $table->date('tanggal_mulai')->required();
            $table->date('tanggal_akhir')->required();
            $table->unsignedBigInteger('worker_id')->required();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
