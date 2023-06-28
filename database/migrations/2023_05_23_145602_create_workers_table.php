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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name',20)->required();
            $table->string('nip',10)->required();
            $table->string('gender',10)->required();
            $table->unsignedBigInteger('dept_id')->required();
            $table->foreign('dept_id')->references('id')->on('dept')->onDelete('restrict');
            $table->unsignedBigInteger('positions_id')->required();
            $table->foreign('positions_id')->references('id')->on('positions')->onDelete('restrict');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
