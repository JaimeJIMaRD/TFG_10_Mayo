<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('papel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foto_id')->nullable();
            $table->foreign('foto_id')->references('id')->on('files')->onDelete('set null');            $table->string('nombre');
            $table->string('nombre_actor');
            $table->string('muestra')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('actor_id')->nullable();
            $table->unsignedBigInteger('elenco_id');
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
        Schema::dropIfExists('papel');
    }
};
