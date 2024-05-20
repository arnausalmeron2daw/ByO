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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_taller');
            $table->date('day');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('descripcion')->nullable(); // Nuevo campo "descripcion"
            $table->string('cita')->nullable(); // Nuevo campo "cita"
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_taller')->references('id')->on('talleres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
