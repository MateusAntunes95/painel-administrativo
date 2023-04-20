<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->index()->constrained('clientes');
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
