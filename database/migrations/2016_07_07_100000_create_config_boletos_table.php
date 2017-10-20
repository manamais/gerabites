<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigBoletosTable extends Migration {

    public function up() {
        Schema::create('config_boletos', function (Blueprint $table) {
            $table->increments('CB_CODIGO');
            $table->string('CB_BANCO', 50);

            $table->string('CB_AGENCIA', 10);
            $table->char('CB_AGENCIA_DV', 1)->nullable();
            $table->string('CB_CONTA', 10);
            $table->char('CB_CONTA_DV', 1);

            $table->float('CB_MULTA', 10, 2)->nullable();
            $table->float('CB_JUROS', 10, 2)->nullable();
            $table->float('CB_JUROSAPOS', 10, 2)->nullable();
            $table->integer('CB_DIASPROTESTO')->nullable();
            $table->string('CB_CARTEIRA', 20)->nullable();
            $table->string('CB_VARIACAOCARTEIRA', 20)->nullable();
            $table->string('CB_CONVENIO', 20);
            $table->string('CB_RANGE', 20)->nullable();
            $table->string('CB_CODIGOCLIENTE', 20);
            $table->string('CB_MENSAGEM1', 200);
            $table->string('CB_MENSAGEM2', 200)->nullable();
            $table->string('CB_MENSAGEM3', 200)->nullable();
            $table->string('CB_INSTRUCAO1', 200);
            $table->string('CB_INSTRUCAO2', 200)->nullable();
            $table->string('CB_INSTRUCAO3', 200)->nullable();
            $table->string('CB_ACEITE', 20);
            $table->string('CB_ESPECIEDOC', 20);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('config_boletos');
    }

}
