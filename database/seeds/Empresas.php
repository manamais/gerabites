<?php

use Illuminate\Database\Seeder;

class Empresas extends Seeder {

    public function run() {
        if (DB::table('empresas')->get()->count() == 0) {
            DB::table('empresas')->insert([
                [
                    'EMPR_CODIGO' => 1,
                    'EMPR_NOMEFANTASIA' => 'BEMFUNCIONAL',
                    'EMPR_RAZAOSOCIAL' => 'BemFuncional Gestão e Tecnologia Ltda – ME',
                    'EMPR_INSCRICAOMUNICIPAL' => '00000000',
                    'EMPR_INSCRICAOESTADUAL' => '00000000',
                    'EMPR_CNPJ' => '08.427.546/0001-35',
                    'EMPR_FONE1' => '(62)3314-3335',
                    'EMPR_FONE2' => '(62)3314-3335',
                    'EMPR_ENDERECO' => 'Avenida Arco Verde s/n, Lote 22, Quadra 1, Sala 1 Jardim Arco Verde',
                    'EMPR_CIDADE' => 'Anápolis',
                    'EMPR_UF' => 'GO',
                    'EMPR_CEP' => '75.105-260',
                    'EMPR_LOGO' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'EMPR_CODIGO' => 2,
                    'EMPR_NOMEFANTASIA' => 'COMPANY NAME',
                    'EMPR_RAZAOSOCIAL' => 'Company Name – LTDA',
                    'EMPR_INSCRICAOMUNICIPAL' => '00000000',
                    'EMPR_INSCRICAOESTADUAL' => '00000000',
                    'EMPR_CNPJ' => '00.000.000/0000-00',
                    'EMPR_FONE1' => '(62)3314-3335',
                    'EMPR_FONE2' => '(62)3314-3335',
                    'EMPR_ENDERECO' => 'Avenida Arco Verde s/n, Lote 22, Quadra 1, Sala 1 Jardim Arco Verde',
                    'EMPR_CIDADE' => 'Anápolis',
                    'EMPR_UF' => 'GO',
                    'EMPR_CEP' => '75.105-260',
                    'EMPR_LOGO' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Empresas não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
