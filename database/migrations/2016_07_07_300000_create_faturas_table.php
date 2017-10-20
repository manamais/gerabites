<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturasTable extends Migration {

    public function up() {
        Schema::create('faturas', function (Blueprint $table) {
            $table->increments('FAT_CODIGO');
            $table->string('FAT_CODREFERENCIA',15);
            $table->date('FAT_DTLANCAMENTO');
            $table->date('FAT_DTVENCIMENTO');
            $table->date('FAT_DTPAGAMENTO');

            $table->float('FAT_DESCONTO', 10, 2);
            $table->string('FAT_PERMITIRPAYPAL', 3);
            $table->string('FAT_STATUS', 15);
            $table->text('FAT_NOTAS');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('faturas');
    }

}
