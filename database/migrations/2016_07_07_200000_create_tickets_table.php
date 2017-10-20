<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

    public function up() {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('TICK_CODIGO');

            $table->integer('user_id_cliente')->unsigned();
            $table->foreign('user_id_cliente')->references('id')->on('users')->onDelete('cascade');

            $table->integer('user_id_atendente')->unsigned();
            $table->foreign('user_id_atendente')->references('id')->on('users')->onDelete('restrict');

            $table->string('TICK_ASSUNTO', 60);
            $table->string('TICK_DEPARTAMENTO', 40);
            $table->string('TICK_PRIORIDADE', 15);
            $table->string('TICK_STATUS', 15);
            $table->string('TICK_ARQUIVO', 120);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('tickets');
    }

}
