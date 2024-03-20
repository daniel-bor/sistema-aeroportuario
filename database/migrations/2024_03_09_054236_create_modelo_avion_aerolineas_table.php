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
        Schema::create('modelo_avion_aerolineas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modelo_avion_id');
            $table->unsignedBigInteger('aerolinea_id');
            $table->timestamps();

            $table->foreign('modelo_avion_id')->references('id')->on('modelo_aviones');
            $table->foreign('aerolinea_id')->references('id')->on('aerolineas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelo_avion_aerolineas');
    }
};
