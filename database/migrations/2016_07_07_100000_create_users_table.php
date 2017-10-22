<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('EMPR_CODIGO')->unsigned();
            $table->foreign('EMPR_CODIGO')->references('EMPR_CODIGO')->on('empresas')->onDelete('cascade');

            $table->string('tipo', 20); /* se é cliente, funcionário ou colaborador */
            $table->string('cargo', 20); /* função na empresa que trabalha ou responde */
            $table->string('name', 120);
            $table->string('matricula', 20)->nullable();
            $table->char('genero', 1);
            $table->date('dtnascimento');
            $table->string('cpf', 14);
            $table->string('rg', 30)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('status', 10);
            $table->string('phone', 14);
            $table->string('cellphone', 14);
            $table->string('cellphone2', 14)->nullable();
            $table->string('email', 255)->unique();
            $table->string('password', 100);
            $table->text('descricao');
            $table->string('exibirnosite', 3);

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::drop('users');
    }

}
