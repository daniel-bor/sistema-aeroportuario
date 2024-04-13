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
        Schema::create('aviones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ensamble');
            $table->string('serie');
            $table->decimal('capacidad_carga', 10, 2);
            $table->decimal('capacidad_pasajeros', 10, 2);
            $table->decimal('capacidad_combustible', 10, 2);
            $table->decimal('tam_asiento_porc', 10, 2);
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('aerolinea_id');
            $table->unsignedBigInteger('modelo_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('tripulacion_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('marca_id')->references('id')->on('catalogo');
            $table->foreign('aerolinea_id')->references('id')->on('aerolineas');
            $table->foreign('tripulacion_id')->references('id')->on('tripulaciones');
            $table->foreign('modelo_id')->references('id')->on('catalogo');
            $table->foreign('tipo_id')->references('id')->on('catalogo');
            $table->foreign('estado_id')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aviones');
    }
};
