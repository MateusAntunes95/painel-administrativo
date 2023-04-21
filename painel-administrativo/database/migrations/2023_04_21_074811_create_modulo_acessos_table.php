<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuloAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_acessos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_acesso_id')->index()->constrained('tipo_acessos');
            $table->string('modulo_acesso');
            $table->boolean('adicionar')->default(false);
            $table->boolean('editar')->default(false);
            $table->boolean('excluir')->default(false);
            $table->boolean('visualizar')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('modulo_acessos');
    }
}
