<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

    public function up() {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('TICK_CODIGO');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('TICK_ASSUNTO', 60);
            $table->string('TICK_DEPARTAMENTO', 40);
            $table->string('TICK_PRIORIDADE', 15);
            $table->string('TICK_STATUS', 15);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('tickets');
    }

}
