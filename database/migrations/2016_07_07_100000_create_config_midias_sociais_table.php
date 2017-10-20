<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigMidiasSociaisTable extends Migration {

    public function up() {
        Schema::create('config_midias_sociais', function (Blueprint $table) {
            $table->increments('MS_CODIGO');
            $table->string('MS_NOME', 30);
            $table->string('MS_URL', 255);
            $table->string('MS_APP_ID', 255)->nullable();
            $table->string('MS_APP_PASSW', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('config_midias_sociais');
    }

}
