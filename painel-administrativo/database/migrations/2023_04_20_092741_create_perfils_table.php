<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{

    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->index()->constrained('clientes');
            $table->string('tipo');
            $table->string('nome_usuario');
            $table->string('url');
            $table->date('ultimo_acesso');

        });
    }

    public function down()
    {
        Schema::dropIfExists('perfils');
    }
}
