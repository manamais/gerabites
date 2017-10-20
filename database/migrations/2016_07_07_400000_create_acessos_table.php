<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcessosTable extends Migration {

    public function up() {
        Schema::create('acessos', function (Blueprint $table) {
            $table->increments('ACES_CODIGO');

            $table->integer('POST_CODIGO')->nullable()->unsigned();
            $table->foreign('POST_CODIGO')->references('POST_CODIGO')->on('posts')->onDelete('cascade');

            $table->integer('ACES_QTD');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('acessos');
    }

}
