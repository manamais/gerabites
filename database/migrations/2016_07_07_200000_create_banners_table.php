<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration {

    public function up() {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('BAN_CODIGO');
            $table->string('BAN_POSICAO',20);
            $table->string('BAN_NOME', 90);
            $table->string('BAN_URL', 255)->nullable();
            $table->integer('BAN_ORDEM')->nullable();
            $table->string('BAN_IMAGEM', 120)->nullable();
            $table->text('BAN_EMBED')->nullable();
            $table->string('BAN_IMAGEMEXTERNA',255)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('banners');
    }

}
