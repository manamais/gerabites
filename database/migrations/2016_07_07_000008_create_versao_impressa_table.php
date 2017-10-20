<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersaoImpressaTable extends Migration {

    public function up() {
        Schema::create('versao_impressa', function (Blueprint $table) {
            $table->increments('VI_CODIGO');
            $table->integer('VI_NUMERO')->unique();
            $table->date('VI_DATA');
            $table->string('VI_PDF', 50);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('versao_impressa');
    }

}
