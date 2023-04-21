<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_acessos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_acessos');
    }
}
