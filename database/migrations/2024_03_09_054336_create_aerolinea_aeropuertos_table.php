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
        Schema::create('aerolinea_aeropuertos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aerolinea_id');
            $table->unsignedBigInteger('aeropuerto_id');
            $table->boolean('is_destino');
            $table->timestamps();

            $table->foreign('aerolinea_id')->references('id')->on('aerolineas');
            $table->foreign('aeropuerto_id')->references('id')->on('aeropuertos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aerolinea_aeropuertos');
    }
};
