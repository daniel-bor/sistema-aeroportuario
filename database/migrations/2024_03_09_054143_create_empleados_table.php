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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->string('correo');
            $table->string('direccion');
            $table->string('telefono');

            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('puesto_id');
            $table->unsignedBigInteger('tripulacion_id');
            $table->unsignedBigInteger('aerolinea_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pais_id')->references('id')->on('paises');
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->foreign('tripulacion_id')->references('id')->on('tripulaciones');
            $table->foreign('aerolinea_id')->references('id')->on('aerolineas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
