<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration {

    public function up() {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('COM_CODIGO');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('COM_COM_CODIGO')->nullable()->unsigned();
            $table->foreign('COM_COM_CODIGO')->references('COM_CODIGO')->on('comentarios')->onDelete('cascade');

            $table->integer('PROJ_CODIGO')->unsigned();
            $table->foreign('PROJ_CODIGO')->references('PROJ_CODIGO')->on('projetos')->onDelete('cascade');

            $table->text('COM_TEXTO');
            $table->string('COM_VISIVELAOCLIENTE', 3);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('comentarios');
    }

}
