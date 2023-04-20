<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_usuario');
            $table->string('nome_completo');
            $table->string('cpf');
            $table->string('rg');
            $table->string('nascimento');
            $table->string('email');
            $table->string('celular');
            $table->string('situacao');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
