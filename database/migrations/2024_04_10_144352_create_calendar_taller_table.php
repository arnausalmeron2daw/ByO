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
        Schema::create('calendar_taller', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_taller');
            $table->foreign('id_taller')->references('id')->on('talleres');
            $table->date('day');
            $table->dateTime('hours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_taller');
    }
};
