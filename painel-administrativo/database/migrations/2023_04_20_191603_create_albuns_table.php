<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatealbunsTable extends Migration
{
    public function up()
    {
        Schema::create('albuns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->index()->constrained('clientes');
            $table->foreignId('perfil_id')->index()->constrained('perfils');
            $table->string('tipo_album');
            $table->string('titulo');
            $table->text('descricao');
            $table->string('caminho_imagem_principal');
            $table->string('caminho_video');
            $table->date('data_inclusao');
            $table->string('situacao');

        });
    }

    public function down()
    {
        Schema::dropIfExists('albuns');
    }
}
