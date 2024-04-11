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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('no_pasaporte');
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->string('correo');
            $table->string('telefono');
            $table->string('telefono_emergencia');
            $table->string('direccion');

            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('codigo_telefono');
            $table->unsignedBigInteger('codigo_telefono_emergencia');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pais_id')->references('id')->on('catalogo');
            $table->foreign('codigo_telefono')->references('id')->on('catalogo');
            $table->foreign('codigo_telefono_emergencia')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
