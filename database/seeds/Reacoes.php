<?php

use Illuminate\Database\Seeder;

class Reacoes extends Seeder {

    public function run() {
        if (DB::table('reacoes')->get()->count() == 0) {
            DB::table('reacoes')->insert([
                [
                    'REA_CODIGO' => 1,
                    'REA_SLUG' => 'PARABÉNS!',
                    'REA_EMOCTION' => 'parabens.gif',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'REA_CODIGO' => 2,
                    'REA_SLUG' => 'BOM',
                    'REA_EMOCTION' => 'bom.png',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'REA_CODIGO' => 3,
                    'REA_SLUG' => 'AMEI!',
                    'REA_EMOCTION' => 'amei.gif',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'REA_CODIGO' => 4,
                    'REA_SLUG' => 'KKKK',
                    'REA_EMOCTION' => 'kkkk.gif',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'REA_CODIGO' => 5,
                    'REA_SLUG' => 'ENGRAÇADO',
                    'REA_EMOCTION' => 'engracado.gif',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'REA_CODIGO' => 6,
                    'REA_SLUG' => 'FALHOU',
                    'REA_EMOCTION' => 'falhou.gif',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'REA_CODIGO' => 7,
                    'REA_SLUG' => 'MEU DEUS!',
                    'REA_EMOCTION' => 'meu-deus.gif',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'REA_CODIGO' => 8,
                    'REA_SLUG' => 'CREDO!',
                    'REA_EMOCTION' => 'credo.gif',
                    'REA_STATUS' => 'ATIVO',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

            ]);
        } else {
            echo "\e[31m Reações não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
