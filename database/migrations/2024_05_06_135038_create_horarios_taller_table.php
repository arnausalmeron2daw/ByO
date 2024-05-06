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
        Schema::create('horarios_taller', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_taller');
            $table->time('lunes_apertura')->nullable();
            $table->time('lunes_cierre')->nullable();
            $table->time('martes_apertura')->nullable();
            $table->time('martes_cierre')->nullable();
            $table->time('miercoles_apertura')->nullable();
            $table->time('miercoles_cierre')->nullable();
            $table->time('jueves_apertura')->nullable();
            $table->time('jueves_cierre')->nullable();
            $table->time('viernes_apertura')->nullable();
            $table->time('viernes_cierre')->nullable();
            $table->time('sabado_apertura')->nullable();
            $table->time('sabado_cierre')->nullable();
            $table->time('domingo_apertura')->nullable();
            $table->time('domingo_cierre')->nullable();
            $table->timestamps();
            $table->foreign('id_taller')->references('id')->on('talleres');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_taller');
    }
};
