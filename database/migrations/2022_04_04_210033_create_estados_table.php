<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string("textoStds", 500);
            $table->string("imagenStds", 255);
            //$table->datetime("fechaCreacionStds", 0);
            //llave foranea
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')
            ->references('id')
            ->on('usuarios')
            ->cascadeOnUpdate()
            ->restricOnDelete();
            
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
