<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReacoesTable extends Migration {

    public function up() {
        Schema::create('reacoes', function (Blueprint $table) {
            $table->increments('REA_CODIGO');
            $table->string('REA_SLUG', 20);
            $table->string('REA_EMOCTION', 20)->nullable();
            $table->string('REA_STATUS', 20);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('reacoes');
    }

}
