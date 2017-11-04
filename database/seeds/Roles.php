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
                    'name' => 'FUNCIONÁRIO',
                    'label' => 'Usuário com permissões de intereações com projetos e clientes.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 4,
                    'name' => 'FINANCEIRO',
                    'label' => 'Perfil de Usuário com permissões para acompanhar as finanças da empresa.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 5,
                    'name' => 'BLOGUEIRO',
                    'label' => 'Usuário com permissões inerentes aos Blogs da empresa.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 6,
                    'name' => 'CLIENTE',
                    'label' => 'Perfil de Usuário para acompanhar finanças, orçamento, andamento do projeto, etc.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
            ]);
        } else {
            echo "\e[31m Roles não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
