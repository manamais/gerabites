<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespesasProjetosTable extends Migration {

    public function up() {
        Schema::create('despesas_projetos', function (Blueprint $table) {
            $table->increments('PROJDESP_CODIGO');

            $table->integer('PROJ_CODIGO')->unsigned();
            $table->foreign('PROJ_CODIGO')->references('PROJ_CODIGO')->on('projetos')->onDelete('cascade');

            $table->integer('TD_CODIGO')->unsigned();
            $table->foreign('TD_CODIGO')->references('TD_CODIGO')->on('tipos_debitos')->onDelete('cascade');

            $table->float('PROJDESP_VALOR', 10, 2);
            $table->date('PROJDESP_DTLANCAMENTO');
            $table->date('PROJDESP_DTVENCIMENTO');
            $table->date('PROJDESP_DTPAGAMENTO')->nullable();
            $table->text('PROJDESP_DESCRICAO');
            $table->string('PROJDESP_MOSTRARCLIENTE', 3);
            $table->string('PROJDESP_FATURAVEL', 3);
            $table->string('PROJDESP_STATUS', 20);
            $table->string('PROJDESP_IMAGEM', 80);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('despesas_projetos');
    }

}
