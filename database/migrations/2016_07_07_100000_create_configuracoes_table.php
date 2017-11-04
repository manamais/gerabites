<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracoesTable extends Migration {

    public function up() {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->increments('CONFIG_CODIGO');
            $table->string('CONFIG_NOMESITE', 120);
            $table->string('CONFIG_LOGOTOPO', 30);
            $table->string('CONFIG_LOGORODAPE', 30);
            $table->string('CONFIG_FAVICON', 30);
            $table->string('CONFIG_METATITLE', 120);
            $table->string('CONFIG_METADESCRIPTION', 255);
            $table->string('CONFIG_METAKEYWORDS', 255);
            $table->string('CONFIG_URLTERMODEUSO', 120);
            $table->text('CONFIG_CODGOOGLE')->nullable();
            $table->text('CONFIG_API');
            $table->text('CONFIG_SENHA');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('configuracoes');
    }

}
