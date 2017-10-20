<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprovantesTable extends Migration {

    public function up() {
        Schema::create('comprovantes', function (Blueprint $table) {
            $table->increments('COMP_CODIGO');

            $table->integer('FAT_CODIGO')->nullable()->unsigned();
            $table->foreign('FAT_CODIGO')->references('FAT_CODIGO')->on('faturas')->onDelete('cascade');

            $table->string('COMP_ARQUIVO',120);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('comprovantes');
    }

}
