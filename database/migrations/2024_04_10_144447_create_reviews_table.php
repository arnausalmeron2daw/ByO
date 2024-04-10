<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_taller');
            $table->unsignedBigInteger('id_servicio');
            $table->integer('rating');
            $table->string('comment');
            $table->date('date_created');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_taller')->references('id')->on('talleres');
            $table->foreign('id_servicio')->references('id')->on('servicios');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
