<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReacoesPostagensTable extends Migration {

    public function up() {
        Schema::create('reacoes_postagens', function (Blueprint $table) {
            $table->increments('RP_CODIGO');

            $table->integer('REA_CODIGO')->unsigned();
            $table->foreign('REA_CODIGO')->references('REA_CODIGO')->on('reacoes')->onDelete('cascade');

            $table->integer('POST_CODIGO')->nullable()->unsigned();
            $table->foreign('POST_CODIGO')->references('POST_CODIGO')->on('posts')->onDelete('cascade');

            $table->string('RP_IP', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('reacoes_postagens');
    }

}
