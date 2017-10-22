<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration {

    public function up() {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('PROD_CODIGO');
            $table->string('PROD_NOME', 90);
            $table->string('PROD_DESCRICAO', 255);
            $table->float('PROD_VALOR', 10, 2);
            $table->string('PROD_TIPO', 100);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('produtos');
    }

}
