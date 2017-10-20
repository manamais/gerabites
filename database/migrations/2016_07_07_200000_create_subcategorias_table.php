<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriasTable extends Migration {

    public function up() {
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->increments('SUBCAT_CODIGO');
            $table->integer('CAT_CODIGO')->unsigned();
            $table->foreign('CAT_CODIGO')->references('CAT_CODIGO')->on('categorias')->onDelete('cascade');
            $table->string('SUBCAT_TITULO', 50);
            $table->string('SUBCAT_SLUG', 60);
            $table->string('SUBCAT_DESCRICAO', 250);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('subcategorias');
    }

}
