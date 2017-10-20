<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class AppServiceProvider extends ServiceProvider {

    public function boot() {
        view()->composer('layouts.restrito', function($view) {
            $configuracoes = DB::table('configuracoes')->get();
            $view->with('configuracoes', $configuracoes);
        });

        view()->composer(['layouts.site','layouts.coluna-social'], function($view) {

            \Carbon\Carbon::setLocale('pt_BR');


            if (!\Cache::has('midias_sociais')) {
                \Cache::put('midias_sociais', DB::table('midias_sociais')->get(), 1);
            }
            $midiaSociais = \Cache::get('midias_sociais');

            if (!\Cache::has('configuracoes')) {
                \Cache::put('configuracoes', DB::table('configuracoes')->get(), 1);
            }
            $configuracoes = \Cache::get('configuracoes');

            if (!\Cache::has('layouts')) {
                \Cache::put('layouts', DB::table('layouts')->where('LAY_STATUS', 'ATIVO')->get(), 1);
            }
            $layouts = \Cache::get('layouts');

            if (!\Cache::has('empresa')) {
                \Cache::put('empresa', DB::table('empresa')->get(), 1);
            }
            $empresas = \Cache::get('empresa');

            if (!\Cache::has('categorias')) {
                \Cache::put('categorias', DB::table('categorias')->where([['CAT_LINKTOPO', 'S'], ['CAT_TIPO', 'E']])->get(), 1);
            }
            $categorias = \Cache::get('categorias');

            if (!\Cache::has('subcategorias')) {
                \Cache::put('subcategorias', DB::table('subcategorias')->get(), 1);
            }
            $subcategorias = \Cache::get('subcategorias');

            if (!\Cache::has('blogs')) {
                \Cache::put('blogs', DB::table('categorias')
                                ->leftJoin('subcategorias', 'subcategorias.CAT_CODIGO', 'categorias.CAT_CODIGO')
                                ->where([['CAT_LINKTOPO', 'S'], ['CAT_TIPO', 'B']])->orWhere('CAT_TIPO', 'C')->get(), 1);
            }
            $blogs = \Cache::get('blogs');


            /**************** anuncios *****************/
            $date = date('Y-m-d');
            if (!\Cache::has('bnnEsquerda')) {
                \Cache::put('bnnEsquerda', DB::table('anuncios')
                                ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                                ->where([['POS_DESCRICAO', 'TOPO-ESQUERDA'], ['ANU_DTTERMINO', '>', $date]])
                                ->orderBy('ANU_ORDEM', 'asc')
                                ->limit(1)
                                ->get(), 1);
            }
            $bnnEsquerda = \Cache::get('bnnEsquerda');

            if (!\Cache::has('bnnDireita')) {
                \Cache::put('bnnDireita', DB::table('anuncios')
                                ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                                ->where([['POS_DESCRICAO', 'TOPO-DIREITA'], ['ANU_DTTERMINO', '>', $date],])
                                ->orderBy('ANU_ORDEM', 'asc')
                                ->limit(1)
                                ->get(), 1);
            }
            $bnnDireita = \Cache::get('bnnDireita');

            $view->with('configuracoes', $configuracoes)
                    ->with('categorias', $categorias)
                    ->with('subcategorias', $subcategorias)
                    ->with('blogs', $blogs)
                    ->with('layouts', $layouts)
                    ->with('empresas', $empresas)
                    ->with('bnnEsquerda', $bnnEsquerda)
                    ->with('bnnDireita', $bnnDireita)
                    ->with('midiaSociais', $midiaSociais)
            ; /* final */
        });
        
        
        
    }

    public function register() {
        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('pt_BR');
        });
    }

}



            //$midiaSociais = DB::table('midias_sociais')->get();
            //$configuracoes = DB::table('configuracoes')->get();
            //$layouts = DB::table('layouts')->where('LAY_STATUS', 'ATIVO')->get();
            //$empresas = DB::table('empresa')->get();
            //$categorias = DB::table('categorias')->where([['CAT_LINKTOPO', 'S'], ['CAT_TIPO', 'E']])->get();
            //$subcategorias = DB::table('subcategorias')->get();
            /* $blogs = DB::table('categorias')
                    ->leftJoin('subcategorias','subcategorias.CAT_CODIGO','categorias.CAT_CODIGO')
                    ->where([['CAT_LINKTOPO', 'S'], ['CAT_TIPO', 'B']])->orWhere('CAT_TIPO', 'C')->get();
             *
             $bnnEsquerda = DB::table('anuncios')
                    ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                    ->where([['POS_DESCRICAO', 'TOPO-ESQUERDA'], ['ANU_DTTERMINO', '>', $date],])
                    ->orderBy('ANU_ORDEM', 'asc')
                    ->limit(1)
                    ->get();
             *
             * $bnnDireita = DB::table('anuncios')
                    ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                    ->where([['POS_DESCRICAO', 'TOPO-DIREITA'], ['ANU_DTTERMINO', '>', $date],])
                    ->orderBy('ANU_ORDEM', 'asc')
                    ->limit(1)
                    ->get();
             */
