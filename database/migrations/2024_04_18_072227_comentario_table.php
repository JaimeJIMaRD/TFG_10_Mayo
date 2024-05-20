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
        Schema::create('comentario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('elenco_id');
            $table->text('contenido');
            $table->timestamp('fecha')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('elenco_id')->references('id')->on('elenco');
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
        Schema::dropIfExists('comentario');
    }
};
