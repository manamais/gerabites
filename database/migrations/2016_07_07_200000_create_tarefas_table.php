<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration {

    public function up() {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->increments('TAR_CODIGO');

            $table->integer('PROD_CODIGO')->unsigned();
            $table->foreign('PROD_CODIGO')->references('PROD_CODIGO')->on('produtos')->onDelete('cascade');

            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('PROJ_CODIGO')->unsigned();
            $table->foreign('PROJ_CODIGO')->references('PROJ_CODIGO')->on('projetos')->onDelete('cascade');

            $table->integer('ETA_CODIGO')->nullable()->unsigned();
            $table->foreign('ETA_CODIGO')->references('ETA_CODIGO')->on('etapas')->onDelete('restrict');

            $table->text('TAR_DESCRICAO');
            $table->datetime('TAR_DTINICIO');
            $table->datetime('TAR_DTPRAZOESTIMADO');
            $table->datetime('TAR_DTFINAL')->nullable();
            $table->string('TAR_ARQUIVO',255)->nullable();
            $table->string('TAR_PROGRESSO',10);
            $table->string('TAR_VISIVELAOCLIENTE',3);
            $table->string('TAR_STATUS',15);
            $table->string('TAR_APVCLIENTE_VALOR',3);
            $table->string('TAR_APVCLIENTE_TAREFA',3);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('tarefas');
    }

}
