<?php

use Illuminate\Database\Seeder;

class PermissionsRoles extends Seeder {

    public function run() {
        if (DB::table('permission_role')->get()->count() == 0) {
            DB::table('permission_role')->insert([
                /* super admin */
                ['role_id' => 1, 'permission_id' => 1],
                /* admin */
                ['role_id' => 2, 'permission_id' => 2],
                ['role_id' => 2, 'permission_id' => 3],
                ['role_id' => 2, 'permission_id' => 4],
                ['role_id' => 2, 'permission_id' => 5],
                ['role_id' => 2, 'permission_id' => 6],
                ['role_id' => 2, 'permission_id' => 7],
                ['role_id' => 2, 'permission_id' => 8],
                ['role_id' => 2, 'permission_id' => 9],
                ['role_id' => 2, 'permission_id' => 10],
                ['role_id' => 2, 'permission_id' => 11],
                ['role_id' => 2, 'permission_id' => 13],
                ['role_id' => 2, 'permission_id' => 14],
                ['role_id' => 2, 'permission_id' => 15],
                ['role_id' => 2, 'permission_id' => 18],
                ['role_id' => 2, 'permission_id' => 19],
                ['role_id' => 2, 'permission_id' => 20],
                ['role_id' => 2, 'permission_id' => 21],
                ['role_id' => 2, 'permission_id' => 22],
                ['role_id' => 2, 'permission_id' => 23],
                ['role_id' => 2, 'permission_id' => 24],
                ['role_id' => 2, 'permission_id' => 25],
                ['role_id' => 2, 'permission_id' => 26],
                ['role_id' => 2, 'permission_id' => 27],
                ['role_id' => 2, 'permission_id' => 30],
                /* REPORTER-COLUNISTA */
                ['role_id' => 3, 'permission_id' => 19],
                ['role_id' => 3, 'permission_id' => 24],
                /* REPORTER-EDITOR */
                ['role_id' => 4, 'permission_id' => 20],
                ['role_id' => 4, 'permission_id' => 24],
                /* EDITOR */
                ['role_id' => 5, 'permission_id' => 13],
                ['role_id' => 5, 'permission_id' => 21],
                ['role_id' => 5, 'permission_id' => 22],
                ['role_id' => 5, 'permission_id' => 23],
                ['role_id' => 5, 'permission_id' => 24],
                ['role_id' => 5, 'permission_id' => 26],
                ['role_id' => 5, 'permission_id' => 27],
                ['role_id' => 5, 'permission_id' => 30],
                /* COLUNISTA SOCIAL */
                ['role_id' => 6, 'permission_id' => 22],
                ['role_id' => 6, 'permission_id' => 24],
                /* CLIENTE ANUNCIANTE */
                ['role_id' => 7, 'permission_id' => 24],
                ['role_id' => 7, 'permission_id' => 29],
                ['role_id' => 7, 'permission_id' => 31],
                /* USUARIO CLIENTE */
                ['role_id' => 8, 'permission_id' => 24],
                ['role_id' => 8, 'permission_id' => 29],
            ]);
        } else {
            echo "\e[31m Permission_Role não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
