<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigEmailsTable extends Migration {

    public function up() {
        Schema::create('config_emails', function (Blueprint $table) {
            $table->increments('EMAIL_CODIGO');
            $table->string('EMAIL_ENDERECO', 150);
            $table->string('EMAIL_DRIVER', 20);
            $table->string('EMAIL_HOST', 50);
            $table->string('EMAIL_PORT', 5);
            $table->string('EMAIL_USERNAME', 150);
            $table->string('EMAIL_PASSWORD', 150);
            $table->string('EMAIL_ENCRYPTION', 5);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('config_emails');
    }

}
