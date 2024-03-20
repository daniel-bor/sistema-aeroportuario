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
        Schema::create('bitacora_cuerpo', function (Blueprint $table) {
            $table->id();
            $table->string('campo');
            $table->string('valor_anterior');
            $table->string('valor_nuevo');
            $table->unsignedBigInteger('bitacora_encabezado_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bitacora_encabezado_id')->references('id')->on('bitacora_encabezado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacora_cuerpo');
    }
};
