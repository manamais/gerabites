<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturasTarefasTable extends Migration {

    public function up() {
        Schema::create('faturas_tarefas', function (Blueprint $table) {
            $table->increments('FT_CODIGO');

            $table->integer('FAT_CODIGO')->nullable()->unsigned();
            $table->foreign('FAT_CODIGO')->references('FAT_CODIGO')->on('faturas')->onDelete('cascade');

            $table->integer('TAR_CODIGO')->nullable()->unsigned();
            $table->foreign('TAR_CODIGO')->references('TAR_CODIGO')->on('tarefas')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('faturas_tarefas');
    }

}
