<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeginFitnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('begin_fitnesses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->string('lat_inicial');
            $table->string('long_inicial');    
            $table->string('lat_final')->nullable(); 
            $table->string('long_final')->nullable();   
            $table->string('distancia')->nullable(); 
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
        Schema::dropIfExists('begin_fitnesses');
    }
}
