<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration {

    public function up() {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('CAT_CODIGO');
            $table->char('CAT_TIPO', 1);
            $table->string('CAT_TITULO', 50);
            $table->string('CAT_SLUG', 60);
            $table->string('CAT_ICONE', 250);
            $table->string('CAT_DESCRICAO', 250);
            $table->string('CAT_CORTOPO', 30);
            $table->string('CAT_CORFONTETOPO', 30);
            $table->char('CAT_LINKTOPO', 1);
            $table->char('CAT_LINKFOOTER', 1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('categorias');
    }

}
