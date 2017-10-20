<?php

use Illuminate\Database\Seeder;

class PosicoesAnuncios extends Seeder
{
    public function run() {
        if (DB::table('posicoes_anuncios')->get()->count() == 0) {
            DB::table('posicoes_anuncios')->insert([
                [
                    'POS_CODIGO' => 1,
                    'POS_TAMANHO' => '360x120',
                    'POS_DESCRICAO' => 'TOPO-ESQUERDA',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'POS_CODIGO' => 2,
                    'POS_TAMANHO' => '360x120',
                    'POS_DESCRICAO' => 'TOPO-DIREITA',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'POS_CODIGO' => 3,
                    'POS_TAMANHO' => '1200x200',
                    'POS_DESCRICAO' => 'TOPO-INTERNA',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'POS_CODIGO' => 4,
                    'POS_TAMANHO' => '1200x200',
                    'POS_DESCRICAO' => 'CENTRO-INTERNA',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'POS_CODIGO' => 5,
                    'POS_TAMANHO' => '1200x200',
                    'POS_DESCRICAO' => 'RODAPE-INTERNA',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'POS_CODIGO' => 6,
                    'POS_TAMANHO' => '450x450',
                    'POS_DESCRICAO' => 'LATERAL',
                    'POS_IMAGEM' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

            ]);
        } else {
            echo "\e[31m PosicoesAnuncios não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }
}
