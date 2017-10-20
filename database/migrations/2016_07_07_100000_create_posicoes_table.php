<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosicoesTable extends Migration {

    public function up() {
        Schema::create('posicoes', function (Blueprint $table) {
            $table->increments('POS_CODIGO');
            $table->string('POS_DESCRICAO', 60);
            $table->string('POS_IMAGEM', 30)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('posicoes');
    }

}
