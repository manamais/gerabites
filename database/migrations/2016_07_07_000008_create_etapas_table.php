<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapasTable extends Migration {

    public function up() {
        Schema::create('etapas', function (Blueprint $table) {
            $table->increments('ETA_CODIGO');
            $table->string('ETA_NOME', 50);
            $table->text('ETA_DESCRICAO');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('etapas');
    }

}
