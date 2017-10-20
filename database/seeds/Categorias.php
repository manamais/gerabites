<?php

use Illuminate\Database\Seeder;

class Categorias extends Seeder {

    public function run() {
        if (DB::table('categorias')->get()->count() == 0) {
            DB::table('categorias')->insert([
                [
                    'CAT_CODIGO' => 1,
                    'CAT_TIPO' => 'T',
                    'CAT_TITULO' => 'TODAS AS PÁGINAS',
                    'CAT_SLUG' => 'todas-as-paginas',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Sem categoria. Somente para tratar páginas dos banners.',
                    'CAT_CORTOPO' => '',
                    'CAT_CORFONTETOPO' => '',
                    'CAT_LINKTOPO' => 'N',
                    'CAT_LINKFOOTER' => 'N',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'CAT_CODIGO' => 2,
                    'CAT_TIPO' => 'C',
                    'CAT_TITULO' => 'COLUNA',
                    'CAT_SLUG' => 'coluna',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Colunas dos mais variados assuntos.',
                    'CAT_CORTOPO' => 'FFFFFF',
                    'CAT_CORFONTETOPO' => 'FFFFFF',
                    'CAT_LINKTOPO' => 'S',
                    'CAT_LINKFOOTER' => 'S',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'CAT_CODIGO' => 3,
                    'CAT_TIPO' => 'B',
                    'CAT_TITULO' => 'BLOG',
                    'CAT_SLUG' => 'blog',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Blogs dos mais variados assuntos.',
                    'CAT_CORTOPO' => 'FFFFFF',
                    'CAT_CORFONTETOPO' => 'FFFFFF',
                    'CAT_LINKTOPO' => 'S',
                    'CAT_LINKFOOTER' => 'S',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'CAT_CODIGO' => 4,
                    'CAT_TIPO' => 'E',
                    'CAT_TITULO' => 'POLÍTICA',
                    'CAT_SLUG' => 'politica',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Categoria de Política.',
                    'CAT_CORTOPO' => 'FFFFFF',
                    'CAT_CORFONTETOPO' => 'FFFFFF',
                    'CAT_LINKTOPO' => 'S',
                    'CAT_LINKFOOTER' => 'S',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'CAT_CODIGO' => 5,
                    'CAT_TIPO' => 'E',
                    'CAT_TITULO' => 'ECONOMIA',
                    'CAT_SLUG' => 'economia',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Categoria de Economia.',
                    'CAT_CORTOPO' => 'FFFFFF',
                    'CAT_CORFONTETOPO' => 'FFFFFF',
                    'CAT_LINKTOPO' => 'S',
                    'CAT_LINKFOOTER' => 'S',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'CAT_CODIGO' => 6,
                    'CAT_TIPO' => 'E',
                    'CAT_TITULO' => 'CULTURA',
                    'CAT_SLUG' => 'cultura',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Categoria de Cultura.',
                    'CAT_CORTOPO' => 'FFFFFF',
                    'CAT_CORFONTETOPO' => 'FFFFFF',
                    'CAT_LINKTOPO' => 'S',
                    'CAT_LINKFOOTER' => 'S',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Categorias não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
