<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepoimentosTable extends Migration {

    public function up() {
        Schema::create('depoimentos', function (Blueprint $table) {
            $table->increments('DEP_CODIGO');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('DEP_TEXTO');
            $table->string('DEP_STATUS',20);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('depoimentos');
    }

}
