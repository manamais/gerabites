<?php

use Illuminate\Database\Seeder;

class SubCategorias extends Seeder {

    public function run() {
        if (DB::table('subcategorias')->get()->count() == 0) {
            DB::table('subcategorias')->insert([
                [
                    'SUBCAT_CODIGO' => 1,
                    'CAT_CODIGO' => 1,
                    'SUBCAT_TITULO' => 'Portifólio',
                    'SUBCAT_SLUG' => 'portifolio',
                    'SUBCAT_DESCRICAO' => 'Portifólio dos trabalhos realizados.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'SUBCAT_CODIGO' => 2,
                    'CAT_CODIGO' => 2,
                    'SUBCAT_TITULO' => 'BemFuncional',
                    'SUBCAT_SLUG' => 'bem-funcional',
                    'SUBCAT_DESCRICAO' => 'Blog principal da empresa.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
            ]);
        } else {
            echo "\e[31m Subcategorias não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
