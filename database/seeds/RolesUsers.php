<?php

use Illuminate\Database\Seeder;

class RolesUsers extends Seeder {

    public function run() {
        if (DB::table('role_user')->get()->count() == 0) {
            DB::table('role_user')->insert([
                [
                    /* superAdmin */
                    'role_id' => 1,
                    'user_id' => 1,
                ],
                [
                    /* administrador */
                    'role_id' => 2,
                    'user_id' => 2,
                ],
                [
                    /* funcionario */
                    'role_id' => 3,
                    'user_id' => 3,
                ],
                [
                    /* cliente */
                    'role_id' => 6,
                    'user_id' => 4,
                ],
            ]);
        } else {
            echo "\e[31m Role_User não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
