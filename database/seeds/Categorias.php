<?php

use Illuminate\Database\Seeder;

class Categorias extends Seeder {

    public function run() {
        if (DB::table('categorias')->get()->count() == 0) {
            DB::table('categorias')->insert([
                [
                    'CAT_CODIGO' => 1,
                    'CAT_TIPO' => 'P',
                    'CAT_TITULO' => 'PÁGINAS',
                    'CAT_SLUG' => 'paginas',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Páginas principais do site.',
                    'CAT_CORTOPO' => '',
                    'CAT_CORFONTETOPO' => '',
                    'CAT_LINKTOPO' => 'N',
                    'CAT_LINKFOOTER' => 'N',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'CAT_CODIGO' => 2,
                    'CAT_TIPO' => 'B',
                    'CAT_TITULO' => 'BLOG',
                    'CAT_SLUG' => 'blogs',
                    'CAT_ICONE' => '',
                    'CAT_DESCRICAO' => 'Blogs dos mais variadas categorias se assim desejar.',
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
