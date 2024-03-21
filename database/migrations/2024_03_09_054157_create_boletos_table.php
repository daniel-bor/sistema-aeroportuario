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
        Schema::create('boletos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_maletas_adquiridas');
            $table->integer('cantidad_maletas_presentadas');
            $table->unsignedBigInteger('estado_boleto_id');
            $table->unsignedBigInteger('vuelo_id');
            $table->unsignedBigInteger('asiento_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('estado_boleto_id')->references('id')->on('estados_boletos');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->foreign('asiento_id')->references('id')->on('asientos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletos');
    }
};
