<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdicionalEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicional_eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_evento')->unsigned();
            $table->string('info_interes');
            $table->string('opiniones');            
            $table->string('materiales');
            $table->string('videos');
            $table->string('faq');
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
        Schema::dropIfExists('adicional_eventos');
    }
}
