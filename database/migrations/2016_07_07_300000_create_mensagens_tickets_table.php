<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagensTicketsTable extends Migration {

    public function up() {
        Schema::create('mensagens_tickets', function (Blueprint $table) {
            $table->increments('MT_CODIGO');

            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->integer('TICK_CODIGO')->unsigned();
            $table->foreign('TICK_CODIGO')->references('TICK_CODIGO')->on('tickets')->onDelete('cascade');
            $table->text('TICK_MENSAGEM');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('mensagens_tickets');
    }

}
