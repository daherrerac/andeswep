<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_actividads', function (Blueprint $table) {
            $table->id();
            $table->integer('id_actividad')->unsigned();
            $table->string('titulo');
            $table->string('imagen');
            $table->string('path')->nullable();            
            $table->string('link');
            $table->longText('descripcion');
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
        Schema::dropIfExists('material_actividads');
    }
}
