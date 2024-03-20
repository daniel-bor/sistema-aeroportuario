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
            $table->string('marca');
            $table->string('serie');
            $table->decimal('capacidad_carga', 10, 2);
            $table->decimal('capacidad_pasajeros', 10, 2);
            $table->decimal('capacidad_combustible', 10, 2);
            $table->unsignedBigInteger('aerolinea_id');
            $table->unsignedBigInteger('modelo_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('aerolinea_id')->references('id')->on('aerolineas');
            $table->foreign('modelo_id')->references('id')->on('modelo_aviones');
            $table->foreign('tipo_id')->references('id')->on('tipo_aviones');
            $table->foreign('estado_id')->references('id')->on('estado_aviones');
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
