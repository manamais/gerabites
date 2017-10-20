<?php

use Illuminate\Database\Seeder;

class Posicoes extends Seeder {

    public function run() {
        if (DB::table('posicoes')->get()->count() == 0) {
            DB::table('posicoes')->insert([
                [
                    'POS_CODIGO' => 1,
                    'POS_DESCRICAO' => 'Automático',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'POS_CODIGO' => 2,
                    'POS_DESCRICAO' => 'PRINCIPAL',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Posições não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
