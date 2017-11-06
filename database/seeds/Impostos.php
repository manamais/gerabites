<?php

use Illuminate\Database\Seeder;

class Impostos extends Seeder
{
 public function run() {
        if (DB::table('impostos')->get()->count() == 0) {
            DB::table('impostos')->insert([
                [
                    'IMP_NOME' => 'ISSQN',
                    'IMP_DESCRICAO' => 'Imposto Sobre Serviço',
                    'IMP_TAXA' => 5.00,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'IMP_NOME' => 'ICMS',
                    'IMP_DESCRICAO' => 'Imposto Sobre Circulação de Mercadoria',
                    'IMP_TAXA' => 3.00,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
            ]);
        } else {
            echo "\e[31m Impostos não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }
}
