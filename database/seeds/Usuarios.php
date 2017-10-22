<?php

use Illuminate\Database\Seeder;

class Usuarios extends Seeder {

    public function run() {
        if (DB::table('users')->get()->count() == 0) {
            DB::table('users')->insert([
                [
                    'id' => 1,
                    'EMPR_CODIGO' => 1,
                    'tipo' => 'ADM',
                    'cargo' => 'CEO',
                    'name' => 'IMPLANTADOR BEMFUNCIONAL',
                    'matricula' => '000000',
                    'genero' => 'M',
                    'dtnascimento' => '1900-09-18',
                    'cpf' => '000.000.000-00',
                    'rg' => '000.000 SSP-BR',
                    'foto' => '',
                    'status' => 'ATIVO',
                    'phone' => '(00)0000-0000',
                    'cellphone' => '(00)0000-0000',
                    'cellphone2' => '(00)0000-0000',
                    'email' => 'super-admin@bemfuncional.com',
                    'password' => '$2y$10$W9U667IjrWa1ds6nPqL1tOUNjOnXBYNDyPawa69AmW4WJAvd.AULm',
                    'descricao' => 'É o CEO da BemFuncional, analista de sistemas e',
                    'exibirnosite' => 'NÃO',

                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 2,
                    'EMPR_CODIGO' => 1,
                    'tipo' => 'COL',
                    'cargo' => 'COLABORADOR',
                    'name' => 'COLABORADOR BEMFUNCIONAL',
                    'matricula' => '000000',
                    'genero' => 'M',
                    'dtnascimento' => '1900-09-18',
                    'cpf' => '000.000.000-00',
                    'rg' => '000.000 SSP-BR',
                    'foto' => '',
                    'status' => 'ATIVO',
                    'phone' => '(00)0000-0000',
                    'cellphone' => '(00)0000-0000',
                    'cellphone2' => '(00)0000-0000',
                    'email' => 'staf@bemfuncional.com',
                    'password' => '$2y$10$W9U667IjrWa1ds6nPqL1tOUNjOnXBYNDyPawa69AmW4WJAvd.AULm',
                    'descricao' => 'É o colaborador da BemFuncional, design e marketing',
                    'exibirnosite' => 'SIM',

                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 3,
                    'EMPR_CODIGO' => 2,
                    'tipo' => 'CLI',
                    'cargo' => 'GERENTE',
                    'name' => 'Jane Doe',
                    'matricula' => '000000',
                    'genero' => 'F',
                    'dtnascimento' => '1900-09-18',
                    'cpf' => '000.000.000-00',
                    'rg' => '000.000 SSP-BR',
                    'foto' => '',
                    'status' => 'ATIVO',
                    'phone' => '(00)0000-0000',
                    'cellphone' => '(00)0000-0000',
                    'cellphone2' => '(00)0000-0000',
                    'email' => 'client@bemfuncional.com',
                    'password' => '$2y$10$W9U667IjrWa1ds6nPqL1tOUNjOnXBYNDyPawa69AmW4WJAvd.AULm',
                    'descricao' => 'É gerente da empresa Company.',
                    'exibirnosite' => 'NÃO',

                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

            ]);
        } else {
            echo "\e[31m Users não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
