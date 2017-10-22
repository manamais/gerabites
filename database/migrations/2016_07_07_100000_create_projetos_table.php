<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration {

    public function up() {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('PROJ_CODIGO');
            
            $table->integer('EMPR_CODIGO')->unsigned();
            $table->foreign('EMPR_CODIGO')->references('EMPR_CODIGO')->on('empresas')->onDelete('cascade');
            
            $table->string('PROJ_NOME', 120)->unique();
            $table->string('PROJ_DESCRICAO', 255);
            $table->string('PROJ_TIPO', 20);
            $table->string('PROJ_STATUS', 20);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::drop('projetos');
    }

}
