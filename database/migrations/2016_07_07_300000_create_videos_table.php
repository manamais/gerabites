<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

    public function up() {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('VID_CODIGO');
            $table->string('VID_TITULO', 256);
            $table->string('VID_URL', 256);
            $table->text('VID_DESCRICAO');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('videos');
    }

}
