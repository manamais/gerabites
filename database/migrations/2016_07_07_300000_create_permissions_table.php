<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

    public function up() {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('label', 500);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')
                    ->references('id')
                    ->on('permissions')
                    ->onDelete('cascade');

            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('cascade');
        });
    }

    public function down() {
        Schema::drop('permission_role');
        Schema::drop('permissions');
    }

}
