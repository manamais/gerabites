<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration {

    public function up() {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('ANU_CODIGO');

            $table->integer('POS_CODIGO')->unsigned();
            $table->foreign('POS_CODIGO')->references('POS_CODIGO')->on('posicoes_anuncios')->onDelete('restrict');

            $table->integer('CAT_CODIGO')->unsigned();
            $table->foreign('CAT_CODIGO')->references('CAT_CODIGO')->on('categorias')->onDelete('restrict');

            $table->integer('ANU_CLIENTE')->nullable();
            $table->string('ANU_NOME', 90);
            $table->string('ANU_URL', 255)->nullable();
            $table->string('ANU_IMAGEM', 120)->nullable();
            $table->integer('ANU_ORDEM')->nullable();
            $table->date('ANU_DTINICIO');
            $table->date('ANU_DTTERMINO');
            $table->text('ANU_EMBED')->nullable();
            $table->string('ANU_IMAGEMEXTERNA',255)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('anuncios');
    }

}
