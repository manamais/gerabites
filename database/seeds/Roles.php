<?php

use Illuminate\Database\Seeder;

class Roles extends Seeder {

    public function run() {
        if (DB::table('roles')->get()->count() == 0) {
            DB::table('roles')->insert([
                [
                    'id' => 1,
                    'name' => 'SUPERADMIN',
                    'label' => 'Perfil com acesso a todos os controles do sistema.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 2,
                    'name' => 'ADMIN',
                    'label' => 'Perfil de usuário com acesso a todos os controles do sistema, exceto a criação de um novo usuário Admin.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 3,
                    'name' => 'REPORTER-COLUNISTA',
                    'label' => 'Perfil de Usuário com permissões restritas a criação e edição de suas próprias matérias ou colunas.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 4,
                    'name' => 'REPORTER-EDITOR',
                    'label' => 'Perfil de Usuário que permite além de gerenciar suas matérias, a publicação dos documentos sem prévia autorização do editor.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 5,
                    'name' => 'EDITOR',
                    'label' => 'Perfil com gerenciamento total no que diz respeito as matérias. Pode ainda criar documentos, posições, editorias, páginas, enquetes, e gerenciar as publicidades.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 6,
                    'name' => 'COLUNISTA-SOCIAL',
                    'label' => 'Acesso restrito a Coluna Social',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 7,
                    'name' => 'CLIENTE-ANUNCIANTE',
                    'label' => 'Usuário com acesso as informações de sua conta referente aos anúncios postados no site.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 8,
                    'name' => 'USUARIO-CLIENTE',
                    'label' => 'Usuário com acesso matérias restritas no site.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Roles não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
