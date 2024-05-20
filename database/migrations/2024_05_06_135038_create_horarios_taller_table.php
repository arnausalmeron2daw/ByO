<?php

use App\Models\HorarioTaller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->boolean('lunes_cerrado')->default(false);
            $table->time('lunes_apertura')->nullable();
            $table->time('lunes_cierre')->nullable();
            $table->boolean('martes_cerrado')->default(false);
            $table->time('martes_apertura')->nullable();
            $table->time('martes_cierre')->nullable();
            $table->boolean('miercoles_cerrado')->default(false);
            $table->time('miercoles_apertura')->nullable();
            $table->time('miercoles_cierre')->nullable();
            $table->boolean('jueves_cerrado')->default(false);
            $table->time('jueves_apertura')->nullable();
            $table->time('jueves_cierre')->nullable();
            $table->boolean('viernes_cerrado')->default(false);
            $table->time('viernes_apertura')->nullable();
            $table->time('viernes_cierre')->nullable();
            $table->boolean('sabado_cerrado')->default(false);
            $table->time('sabado_apertura')->nullable();
            $table->time('sabado_cierre')->nullable();
            $table->boolean('domingo_cerrado')->default(false);
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
