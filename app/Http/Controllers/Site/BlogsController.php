<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\StandardControllerPublic;
use App\Models\Restrito\Layouts;
use App\Models\Restrito\Categorias;
use App\Models\Restrito\SubCategorias;
use App\Models\Restrito\Colunistas;
use App\User;
use App\Models\Restrito\Anuncios;
use App\Models\Restrito\Posts;
use App\Models\Restrito\Acessos;
use Helori\LaravelSeo\Facades\Seo;
use Mbarwick83\Shorty\Facades\Shorty;
use App\Models\Restrito\Reacoes;
use App\Models\Restrito\ReacoesPostagens;
use Illuminate\Support\Facades\DB;

class BlogsController extends StandardControllerPublic {

    protected $layout;
    protected $categorias;
    protected $subcategorias;
    protected $colunistas;
    protected $users;
    protected $posts;
    protected $anuncios;
    protected $reacoes;
    protected $reacoesPostagens;
    protected $acessos;
    protected $gate;

    public function __construct(Acessos $acessos, Layouts $layout, Categorias $categorias, Colunistas $colunistas, User $users, Posts $posts, SubCategorias $subcategorias, Anuncios $anuncios, Reacoes $reacoes, ReacoesPostagens $reacoesPostagens) {
        $this->layout = $layout;
        $this->categorias = $categorias;
        $this->subcategorias = $subcategorias;
        $this->colunistas = $colunistas;
        $this->users = $users;
        $this->posts = $posts;
        $this->anuncios = $anuncios;
        $this->reacoes = $reacoes;
        $this->acessos = $acessos;
        $this->reacoesPostagens = $reacoesPostagens;
        $this->gate = 'SECRETARIA';
    }

    public function blog($blogs) {
        /* configurações do layout que vai ser aplicado a página acessada */
        $layout = $this->layout->where('LAY_STATUS', 'ATIVO')->first();
        $corFontePadrao = $layout->LAY_CORFONTEPADRAO;
        $corTopo = $layout->LAY_CORTOPO;
        $corFonteTopo = $layout->LAY_CORFONTETOPO;

        /* opções a cerca das categorias */
        $subcategorias = $this->subcategorias
                        ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                        ->where('SUBCAT_SLUG', $blogs)->first();

        if ($subcategorias == null) {
            abort(404, 'Página não Existe!');
        }
        $dbCategorias = $this->subcategorias
                        ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                        ->where('SUBCAT_SLUG', $blogs)->get();
        $corCategoria = $subcategorias->CAT_CORTOPO;
        $corFonte = $subcategorias->CAT_CORFONTETOPO;

        if ($layout->LAY_CODIGO == 1) {
            $view = 'site.blog.index';
        }
        if ($layout->LAY_CODIGO == 2) {
            $view = 'site.blog2.index';
        }
        if ($layout->LAY_CODIGO == 3) {
            $view = 'site.blog3.index';
        }

        /* informações do colunista quando houver */
        $colunistas = $this->colunistas
                        ->leftJoin('users', 'users.id', 'user_id')
                        ->where('SUBCAT_CODIGO', $subcategorias->SUBCAT_CODIGO)
                        ->orderBy('COL_CODIGO', 'desc')->limit(1)->get();

        /*         * ******* anuncios  ********* */
        $date = date('Y-m-d');

        $bannersLateral = $this->anuncios
                ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'LATERAL'], ['CAT_CODIGO', 1]])
                ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'LATERAL'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                ->orderBy('ANU_ORDEM', 'asc')
                ->get();

        $bannerTopo = $this->anuncios
                ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'TOPO-INTERNA'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'TOPO-INTERNA'], ['CAT_CODIGO', 1]])
                ->orderBy('ANU_ORDEM', 'asc')
                ->limit(1)
                ->get();
        /*         * ******* anuncios  ********* */


        /* chamadas relacionados a categoria acessada */
        $posts = $this->posts
                ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'posts.SUBCAT_CODIGO')
                ->where('subcategorias.SUBCAT_CODIGO', $subcategorias->SUBCAT_CODIGO)
                ->orderBy('POST_CODIGO', 'desc')
                ->paginate(10);










        return view($view, compact('dbCategorias', 'colunistas', 'bannerTopo', 'posts', 'bannersLateral', 'destaque', 'lateralDestaque', 'lateral3'))
                        ->with('titulo', $subcategorias->SUBCAT_TITULO)
                        ->with('corCategoria', $corCategoria)
                        ->with('corFonte', $corFonte)
                        ->with('corFontePadrao', $corFontePadrao)
                        ->with('corTopo', $corTopo)
                        ->with('corFonteTopo', $corFonteTopo);
    }

    /*
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     */

    public function post($blogs, $slug) {
        /* configurações do layout que vai ser aplicado a página acessada */
        $layout = $this->layout->where('LAY_STATUS', 'ATIVO')->first();
        $corFontePadrao = $layout->LAY_CORFONTEPADRAO;
        $corTopo = $layout->LAY_CORTOPO;
        $corFonteTopo = $layout->LAY_CORFONTETOPO;
        /* opções a cerca das categorias */
        
        $subcategorias = $this->subcategorias
                        ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                        ->leftJoin('posts', 'posts.SUBCAT_CODIGO', 'subcategorias.SUBCAT_CODIGO')
                        ->where([['SUBCAT_SLUG', $blogs], ['POST_SLUG', $slug]])->first();

        if ($subcategorias == null) {
            abort(404, 'Página não Existe!');
        }
        $dbCategorias = $this->subcategorias
                        ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                        ->where('SUBCAT_SLUG', $blogs)->get();
        $corCategoria = $subcategorias->CAT_CORTOPO;
        $corFonte = $subcategorias->CAT_CORFONTETOPO;

        if ($layout->LAY_CODIGO == 1) {
            $view = 'site.blog.interna';
        }
        if ($layout->LAY_CODIGO == 2) {
            $view = 'site.blog2.interna';
        }
        if ($layout->LAY_CODIGO == 3) {
            $view = 'site.blog3.interna';
        }

        /* informações do colunista quando houver */
        $colunistas = $this->colunistas
                        ->leftJoin('users', 'users.id', 'user_id')
                        ->where('SUBCAT_CODIGO', $subcategorias->SUBCAT_CODIGO)
                        ->orderBy('COL_CODIGO', 'desc')->limit(1)->get();

        /*         * ******* anuncios  ********* */
        $date = date('Y-m-d');

        $bannersLateral = $this->anuncios
                ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'LATERAL'], ['CAT_CODIGO', 1]])
                ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'LATERAL'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                ->orderBy('ANU_ORDEM', 'asc')
                ->get();

        $bannerTopo = $this->anuncios
                ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'TOPO-INTERNA'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'TOPO-INTERNA'], ['CAT_CODIGO', 1]])
                ->orderBy('ANU_ORDEM', 'asc')
                ->limit(1)
                ->get();
        /*         * ******* anuncios  ********* */

        $titulo = $this->posts
                        ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'posts.SUBCAT_CODIGO')
                        ->where([['SUBCAT_SLUG', $blogs], ['POST_SLUG', $slug]])->first();

        
        
        
        /************ atualizar acesso do post ***************/
        $acessos = $this->acessos->where('POST_CODIGO', $titulo->POST_CODIGO)->first();
        if ($acessos != null) {
            $qtd = $acessos->ACES_QTD + 1;
            $this->acessos->where('ACES_CODIGO', $acessos->ACES_CODIGO)->update(['ACES_QTD' => $qtd]);
        } else {
            $this->acessos->create([ 'POST_CODIGO' => $titulo->POST_CODIGO, 'ANU_CODIGO' => '', 'ACES_QTD' => 1, ]);
        }
        /************ atualizar acesso do post ***************/




        $posts = $this->posts
                        ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'posts.SUBCAT_CODIGO')
                        ->where([['SUBCAT_SLUG', $blogs], ['POST_SLUG', $slug]])
                        ->select('posts.*', 'subcategorias.*', 'posts.created_at as criado', 'posts.updated_at as alterado')
                        ->orderBy('POST_CODIGO', 'desc')->limit(1)->get();
        $artigos = $this->posts
                ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'posts.SUBCAT_CODIGO')
                ->where([['SUBCAT_SLUG', $blogs], ['POST_CODIGO', '<>', $titulo->POST_CODIGO]])
                ->select('posts.*', 'subcategorias.*', 'posts.created_at as criado', 'posts.updated_at as alterado')
                ->orderBy('POST_CODIGO', 'desc')
                ->limit(10)
                ->get();
        if (isset($titulo->POST_IMAGE) && $titulo->POST_IMAGE != '') {
            $foto = $titulo->POST_IMAGE;
        } else {
            $foto = 'socialCard.jpg';
        }

        Seo::set('title', $titulo->POST_TITULO);
        Seo::set('description', $titulo->POST_SUBTITULO);
        Seo::set('keywords', $titulo->POST_TAGS);
        Seo::set('breadcrumblist', [
            ['title' => 'GIRASSOL', 'url' => 'http://www.ogirassol.com.br'],
            ['title' => 'politica', 'url' => 'http://www.ogirassol.com.br/politica'],
            ['title' => 'aqui-e-a-url-por-completo', 'url' => 'http://www.ogirassol.com.br/politica/aqui-e-a-url-por-completo'],
        ]);

        Seo::set('global-title', 'O GIRASSOL');
        Seo::set('global-description', $titulo->POST_SUBTITULO);

        Seo::set('logo-url', 'logo url');
        Seo::set('search-url', 'search url for structured data');
        Seo::set('latitude', 10.194031);
        Seo::set('longitude', 48.353519);

        Seo::set('email', 'ogirassol@uol.com.br');
        Seo::set('phone', '(63)4141-0224');
        Seo::set('opening-hours', 'Mo,Tu,We,Th,Fr 08:00-18:00');
        Seo::set('street-address', 'Av. Teotonio Segurado, 101 S, Cj.01, Lt. 06 Sala 408 - (Edificio Office Center)');
        Seo::set('address-locality', 'Palmas');
        Seo::set('address-region', 'Tocantins');
        Seo::set('address-country', 'BR');
        Seo::set('postal-code', '77015-002');
        Seo::set('area-served', 'BR');

        Seo::setSimilarTo('https://www.facebook.com/ogirassol');
        Seo::setSimilarTo('https://twitter.com/ogirassol');

        Seo::setContactPoint([
            'type' => 'customer-service',
            'phone' => '(63)4141-0224',
            'area-served' => 'BR',
            'opening-hours' => 'Mo,Tu,We,Th,Fr 08:00-18:00',
            'available-languages' => ['Portuguese']
        ]);


        Seo::set('og-locale', 'pt_BR');
        Seo::set('og-type', 'article');
        Seo::set('og-site_name', 'O GIRASSOL'); // SITENAME
        Seo::set('og-image-url', "$foto");
        Seo::set('og-image-type', 'image/jpeg');
        Seo::set('og-image-width', 1200);
        Seo::set('og-image-height', 630);



        //$raiz = url("/");
        $raiz = "http://www.ogirassol.com";
        $url = $raiz . '/blogs' . "/$blogs/$slug";
        $urlShort = Shorty::shorten($url);


        Seo::set('twitter-card', '');
        Seo::set('twitter-site', '@ogirassol');
        Seo::set('twitter-title', $titulo->POST_TITULO);
        Seo::set('twitter-content', $titulo->POST_SUBTITULO);
        Seo::set('twitter-description', "$titulo->POST_SUBTITULO");
        Seo::set('twitter-image', "$foto");
        Seo::set('twitter-url', "$urlShort");
        Seo::set('twitter-card', "summary");

        /* reações e computação dos votos das postagens */
        $reacoes = DB::table('reacoes AS T1')
                        ->select('T1.*', DB::raw("(SELECT COUNT(*) FROM reacoes_postagens AS T2 "
                                        . "WHERE T2.REA_CODIGO = T1.REA_CODIGO  AND T2.POST_CODIGO = $titulo->POST_CODIGO) AS VOTOS"))
                        ->where('REA_STATUS', 'ATIVO')->get();
        /* reações e computação dos votos das postagens */







        $destaques = $this->posts
                ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'posts.SUBCAT_CODIGO')
                ->where([['SUBCAT_SLUG', $blogs], ['POST_CODIGO', '<>', $titulo->POST_CODIGO]])
                ->select('posts.*', 'subcategorias.*', 'posts.created_at as criado', 'posts.updated_at as alterado')
                ->orderBy('POST_CODIGO', 'desc')
                ->limit(3)
                ->get();



        return view($view, compact('destaques', 'reacoes', 'artigos', 'dbCategorias', 'colunistas', 'bannerTopo', 'posts', 'bannersLateral', 'destaque', 'lateralDestaque', 'lateral3'))
                        ->with('corCategoria', $corCategoria)
                        ->with('corFonte', $corFonte)
                        ->with('corFontePadrao', $corFontePadrao)
                        ->with('corTopo', $corTopo)
                        ->with('corFonteTopo', $corFonteTopo);
    }

}
