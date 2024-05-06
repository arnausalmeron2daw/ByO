<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_taller');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->timestamps();

            // Definir la clave externa
            $table->foreign('id_taller')->references('id')->on('talleres')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_sociales');
    }
};
