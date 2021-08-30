<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelistaEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panelista_eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_panelista')->unsigned();
            $table->integer('id_evento')->unsigned();
            $table->integer('organizador')->unsigned();
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
        Schema::dropIfExists('panelista_eventos');
    }
}
