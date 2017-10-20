<?php

use Illuminate\Database\Seeder;

class SubCategorias extends Seeder {

    public function run() {
        if (DB::table('subcategorias')->get()->count() == 0) {
            DB::table('subcategorias')->insert([
                [
                    'SUBCAT_CODIGO' => 1,
                    'CAT_CODIGO' => 1,
                    'SUBCAT_TITULO' => 'Subcategoria',
                    'SUBCAT_SLUG' => 'brasil',
                    'SUBCAT_DESCRICAO' => 'Política no Brasil',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'SUBCAT_CODIGO' => 2,
                    'CAT_CODIGO' => 2,
                    'SUBCAT_TITULO' => 'Social',
                    'SUBCAT_SLUG' => 'social',
                    'SUBCAT_DESCRICAO' => 'Coluna Social',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'SUBCAT_CODIGO' => 3,
                    'CAT_CODIGO' => 3,
                    'SUBCAT_TITULO' => 'Meu Blog',
                    'SUBCAT_SLUG' => 'meu-blog',
                    'SUBCAT_DESCRICAO' => 'Modelo de blog',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'SUBCAT_CODIGO' => 4,
                    'CAT_CODIGO' => 4,
                    'SUBCAT_TITULO' => 'Brasil',
                    'SUBCAT_SLUG' => 'brasil',
                    'SUBCAT_DESCRICAO' => 'Política no Brasil',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'SUBCAT_CODIGO' => 5,
                    'CAT_CODIGO' => 4,
                    'SUBCAT_TITULO' => 'Goiás',
                    'SUBCAT_SLUG' => 'goias',
                    'SUBCAT_DESCRICAO' => 'Política no Estado de Goiás',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Subcategorias não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
