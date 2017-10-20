<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosicoesAnunciosTable extends Migration {

    public function up() {
        Schema::create('posicoes_anuncios', function (Blueprint $table) {
            $table->increments('POS_CODIGO');
            $table->string('POS_TAMANHO', 30);
            $table->string('POS_DESCRICAO', 60);
            $table->string('POS_IMAGEM', 30)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('posicoes_anuncios');
    }

}
