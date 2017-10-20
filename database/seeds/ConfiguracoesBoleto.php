<?php

use Illuminate\Database\Seeder;

class ConfiguracoesBoleto extends Seeder {

    public function run() {
        if (DB::table('config_boletos')->get()->count() == 0) {
            DB::table('config_boletos')->insert([
                [
                    'CB_BANCO' => 'BANCO DO BRASIL',
                    'CB_AGENCIA' => '3962',
                    'CB_AGENCIA_DV' => '4',
                    'CB_CONTA' => '5502',
                    'CB_CONTA_DV' => '6',
                    'CB_MULTA' => '0',
                    'CB_JUROS' => '0',
                    'CB_JUROSAPOS' => '0',
                    'CB_DIASPROTESTO' => '0',
                    'CB_CARTEIRA' => '18',
                    'CB_VARIACAOCARTEIRA' => '019',
                    'CB_CONVENIO' => '000000',
                    'CB_RANGE' => '00',
                    'CB_CODIGOCLIENTE' => '000',
                    'CB_ACEITE' => '000',
                    'CB_ESPECIEDOC' => '000',
                    'CB_MENSAGEM1' => 'PAGÁVEL EM QUALQUER BANCO ATÉ O VENCIMENTO',
                    'CB_MENSAGEM2' => '',
                    'CB_MENSAGEM3' => '',
                    'CB_INSTRUCAO1' => 'SR(A) CAIXA, NÃO RECEBA APÓS O VENCIMENTO',
                    'CB_INSTRUCAO2' => '',
                    'CB_INSTRUCAO3' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Configurações Boleto não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
