<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panelistas', function (Blueprint $table) {
            $table->id();                        
            $table->string('nombre');
            $table->string('profile_picture');
            $table->string('path')->nullable();            
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('ig')->nullable();
            $table->string('li')->nullable();
            $table->string('mail')->nullable();
            $table->string('telefono')->nullable();
            $table->string('resumen')->nullable();
            $table->longText('hv');
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
        Schema::dropIfExists('panelistas');
    }
}
