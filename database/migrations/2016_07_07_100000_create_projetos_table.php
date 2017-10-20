<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration {

    public function up() {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('PROJ_CODIGO');
            $table->string('PROJ_NOME', 120);
            $table->string('PROJ_DESCRICAO', 255);
            $table->string('PROJ_TIPO', 20);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::drop('projetos');
    }

}
