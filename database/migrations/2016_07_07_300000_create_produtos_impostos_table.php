<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosImpostosTable extends Migration {

    public function up() {
        Schema::create('produtos_impostos', function (Blueprint $table) {
            $table->increments('PI_CODIGO');

            $table->integer('PROD_CODIGO')->unsigned();
            $table->foreign('PROD_CODIGO')->references('PROD_CODIGO')->on('produtos')->onDelete('cascade');

            $table->integer('IMP_CODIGO')->unsigned();
            $table->foreign('IMP_CODIGO')->references('IMP_CODIGO')->on('impostos')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('produtos_impostos');
    }

}
