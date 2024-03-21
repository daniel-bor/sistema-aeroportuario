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
        Schema::create('vuelo_clase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clase_id');
            $table->unsignedBigInteger('vuelo_id');
            $table->decimal('precio', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('clase_id')->references('id')->on('clases');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelo_clase');
    }
};
