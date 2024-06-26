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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->timestamp('fecha_salida');
            $table->timestamp('fecha_llegada');
            $table->unsignedBigInteger('avion_id');
            $table->unsignedBigInteger('aeropuerto_origen_id');
            $table->unsignedBigInteger('aeropuerto_destino_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('avion_id')->references('id')->on('aviones');
            $table->foreign('aeropuerto_origen_id')->references('id')->on('aeropuertos');
            $table->foreign('aeropuerto_destino_id')->references('id')->on('aeropuertos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
