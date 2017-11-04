<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('POST_CODIGO');

            $table->integer('SUBCAT_CODIGO')->unsigned();
            $table->foreign('SUBCAT_CODIGO')->references('SUBCAT_CODIGO')->on('subcategorias')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('POST_CODIGO_CORRELATA')->nullable()->unsigned();
            $table->foreign('POST_CODIGO_CORRELATA')->references('POST_CODIGO')->on('posts')->onDelete('cascade');

            $table->string('POST_RETRANCA', 60)->nullable();
            $table->string('POST_TITULO', 180);
            $table->string('POST_SUBTITULO', 256)->nullable();
            $table->string('POST_SLUG', 256);
            $table->text('POST_TEXTO');
            $table->string('POST_TAGS', 256);
            $table->string('POST_TAGS_URL', 256);
            $table->string('POST_STATUS', 15);
            $table->string('POST_IMAGE', 256)->nullable();
            $table->string('POST_IMAGE_CREDITO', 256)->nullable();
            $table->string('POST_IMAGE_LEGENDA', 256)->nullable();
            $table->string('POST_VIDEO',500)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down() {
        Schema::dropIfExists('posts');
    }

}
