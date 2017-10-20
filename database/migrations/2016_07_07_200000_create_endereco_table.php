<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTable extends Migration {

    public function up() {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('END_CODIGO');
            $table->string('END_CEP', 10);
            $table->string('END_LOGRADOURO', 100);
            $table->string('END_TIPOLOGRADOURO', 20);
            $table->string('END_BAIRRO', 100);
            $table->string('END_CIDADE', 100);
            $table->string('END_UF', 2);
            $table->string('END_COMPLEMENTO', 20);
            $table->string('END_NUMERO', 7);
            $table->string('END_DESCRICAOERRO', 200);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('enderecos');
    }

}
