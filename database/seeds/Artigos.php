<?php

use Illuminate\Database\Seeder;

class Artigos extends Seeder {

    public function run() {
        factory('App\Models\Restrito\Artigos', 20)->create();
    }

}
