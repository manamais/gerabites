<?php

use Illuminate\Database\Seeder;

class Posts extends Seeder {

    public function run() {
        factory('App\Models\Restrito\Posts', 20)->create();
    }

}
