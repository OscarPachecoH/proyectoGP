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
        Schema::create('procesoplantillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('actividades');
            $table->string('actores');
            $table->unsignedInteger('idProceso');
            $table->foreign('idProceso')->references('id')->on('procesos')->onDelete('cascade');
            $table->unsignedInteger('idProyecto');
            $table->foreign('idProyecto')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('procesoplantillas');
    }
};
