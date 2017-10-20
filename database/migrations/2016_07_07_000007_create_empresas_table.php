<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

    public function up() {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('EMPR_CODIGO');
            $table->string('EMPR_NOMEFANTASIA', 200);
            $table->string('EMPR_RAZAOSOCIAL', 200);
            $table->string('EMPR_INSCRICAOMUNICIPAL', 20)->nullable();
            $table->string('EMPR_INSCRICAOESTADUAL', 20)->nullable();
            $table->string('EMPR_CNPJ', 20);
            $table->string('EMPR_FONE1', 15);
            $table->string('EMPR_FONE2', 15)->nullable();
            $table->string('EMPR_ENDERECO', 200);
            $table->string('EMPR_CIDADE', 120);
            $table->string('EMPR_UF', 2);
            $table->string('EMPR_CEP', 15);
            $table->string('EMPR_LOGO', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('empresas');
    }

}
