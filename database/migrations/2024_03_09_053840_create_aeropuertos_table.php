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
        Schema::create('aeropuertos', function (Blueprint $table) {
            $table->id();
            $table->string('IATA', 3);
            $table->string('OACI', 4);
            $table->string('nombre');
            $table->string('ciudad');
            $table->string('localidad');
            $table->string('zona_horaria');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->boolean('activo')->default(true);
            $table->boolean('interno')->default(true);
            $table->unsignedBigInteger('pais_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pais_id')->references('id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aeropuertos');
    }
};
