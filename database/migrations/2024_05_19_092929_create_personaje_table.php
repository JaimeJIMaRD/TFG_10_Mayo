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
        Schema::create('personaje', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('serie');
            $table->string('actor_original')->nullable();
            $table->unsignedBigInteger('muestra_id')->nullable();
            $table->unsignedBigInteger('imagen_logo_id')->nullable();
            $table->unsignedBigInteger('imagen_fondo_id')->nullable();
            $table->foreign('muestra_id')->references('id')->on('files')->onDelete('set null');
            $table->foreign('imagen_logo_id')->references('id')->on('files')->onDelete('set null');
            $table->foreign('imagen_fondo_id')->references('id')->on('files')->onDelete('set null');
            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personaje');
    }
};
