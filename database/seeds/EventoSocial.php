<?php

use Illuminate\Database\Seeder;

class EventoSocial extends Seeder {

    public function run() {
        if (DB::table('eventos_sociais')->get()->count() == 0) {
            DB::table('eventos_sociais')->insert([
                [
                    'ES_CODIGO' => 1,
                    'ES_TITULO' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m EventosSociais não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
