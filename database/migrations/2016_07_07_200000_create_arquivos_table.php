<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivosTable extends Migration {

    public function up() {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->increments('ARQ_CODIGO');

            $table->integer('PROJ_CODIGO')->unsigned();
            $table->foreign('PROJ_CODIGO')->references('PROJ_CODIGO')->on('projetos')->onDelete('cascade');

            $table->string('ARQ_NOME', 60);
            $table->string('ARQ_DESCRICAO', 120);
            $table->string('ARQ_URL', 80);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('arquivos');
    }

}
