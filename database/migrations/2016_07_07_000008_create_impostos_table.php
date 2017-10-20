<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpostosTable extends Migration {

    public function up() {
        Schema::create('impostos', function (Blueprint $table) {
            $table->increments('IMP_CODIGO');
            $table->string('IMP_NOME', 50);
            $table->float('IMP_TAXA', 10, 2);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('impostos');
    }

}
