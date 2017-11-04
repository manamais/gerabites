<?php

use Illuminate\Database\Seeder;

class Sistema extends Seeder {

    public function run() {
        if (DB::table('configuracoes')->get()->count() == 0) {
            DB::table('configuracoes')->insert([
                [
                    'CONFIG_CODIGO' => 1,
                    'CONFIG_NOMESITE' => 'BEMFUNCIONAL',
                    'CONFIG_LOGOTOPO' => 'logoTopo.png',
                    'CONFIG_LOGORODAPE' => 'logoRodape.png',
                    'CONFIG_FAVICON' => 'favicon.png',
                    'CONFIG_METATITLE' => 'BEMFUNCIONAL',
                    'CONFIG_METADESCRIPTION' => 'BEMFUNCIONAL',
                    'CONFIG_METAKEYWORDS' => 'BEMFUNCIONAL',
                    'CONFIG_URLTERMODEUSO' => 'BEMFUNCIONAL',
                    'CONFIG_CODGOOGLE' => 'BEMFUNCIONAL',
                    'CONFIG_API' => 'BEMFUNCIONAL',
                    'CONFIG_SENHA' => 'BEMFUNCIONAL',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Empresas não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
