<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration {

    public function up() {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('BUGS_CODIGO');

            $table->integer('PROJ_CODIGO')->unsigned();
            $table->foreign('PROJ_CODIGO')->references('PROJ_CODIGO')->on('projetos')->onDelete('cascade');

            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->string('BUGS_NOME', 60);
            $table->string('BUGS_GRAVIDADE', 20);
            $table->text('BUGS_DESCRICAO');
            $table->string('BUGS_STATUS', 20);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('bugs');
    }

}
