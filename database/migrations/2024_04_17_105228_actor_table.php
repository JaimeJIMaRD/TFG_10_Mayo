<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('estado');
            $table->json('actores_recurrentes')->nullable();
            $table->unsignedBigInteger('foto_id')->nullable();
            $table->foreign('foto_id')->references('id')->on('files')->onDelete('set null');
            $table->string('eldoblaje')->nullable();
            $table->string('twitter')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor');
    }
};
