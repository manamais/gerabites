<?php

use Illuminate\Database\Seeder;

class Produtos extends Seeder
{
 public function run() {
        if (DB::table('produtos')->get()->count() == 0) {
            DB::table('produtos')->insert([
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM < 1.2)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de até 23.772 habitantes',
                    'PROD_VALOR' => 660.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM 1.4 à 2.2)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 23.772 à 61.128 habitantes',
                    'PROD_VALOR' => 1200.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM 2.4 à 3.0)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 61.129 à 101.880 habitantes',
                    'PROD_VALOR' => 1200.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM 3.2 à 4.0)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 101.880 à 300.000 habitantes',
                    'PROD_VALOR' => 2000.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (CAPITAIS)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para capitais e distritos federais da federação',
                    'PROD_VALOR' => 2500.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'PROD_NOME' => 'PUBLICA-PLUS (IPM < 1.2)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de até 23.772 habitantes',
                    'PROD_VALOR' => 1200.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-plus (IPM 1.4 à 2.2)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 23.772 à 61.128 habitantes',
                    'PROD_VALOR' => 1800.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM 2.4 à 3.0)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 61.129 à 101.880 habitantes',
                    'PROD_VALOR' => 2400.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM 3.2 à 4.0)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 101.880 à 300.000 habitantes',
                    'PROD_VALOR' => 3000.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (CAPITAIS)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para capitais e distritos federais da federação',
                    'PROD_VALOR' => 3500.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'PROD_NOME' => 'PUBLICA-SUPER (IPM < 1.2)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de até 23.772 habitantes',
                    'PROD_VALOR' => 1700.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-plus (IPM 1.4 à 2.2)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 23.772 à 61.128 habitantes',
                    'PROD_VALOR' => 2500.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM 2.4 à 3.0)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 61.129 à 101.880 habitantes',
                    'PROD_VALOR' => 3500.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (IPM 3.2 à 4.0)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para municípios de 101.880 à 300.000 habitantes',
                    'PROD_VALOR' => 4500.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'PROD_NOME' => 'PUBLICA-ESSENCIAL (CAPITAIS)',
                    'PROD_DESCRICAO' => 'Mensalidade do Sistema para capitais e distritos federais da federação',
                    'PROD_VALOR' => 5000.00,
                    'PROD_TIPO' => 'Mensalidade',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
                
                
            ]);
        } else {
            echo "\e[31m Impostos não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }
}
