<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\StandardControllerPublic;
use App\Models\Restrito\SubCategorias;
use App\Models\Restrito\Colunistas;
use App\User;
use App\Models\Restrito\Anuncios;
use App\Models\Restrito\Acessos;
use Helori\LaravelSeo\Facades\Seo;
use Mbarwick83\Shorty\Facades\Shorty;
use App\Models\Restrito\Reacoes;
use App\Models\Restrito\ReacoesPostagens;
use App\Models\Restrito\ColunasSociais;
use Illuminate\Support\Facades\DB;

class ColunaSocialController extends StandardControllerPublic {

    protected $layout;
    protected $categorias;
    protected $subcategorias;
    protected $colunistas;
    protected $users;
    protected $cs;
    protected $anuncios;
    protected $reacoes;
    protected $reacoesPostagens;
    protected $acessos;
    protected $gate;

    public function __construct(Acessos $acessos, Colunistas $colunistas, User $users, ColunasSociais $cs, SubCategorias $subcategorias, Anuncios $anuncios, Reacoes $reacoes, ReacoesPostagens $reacoesPostagens) {
        $this->subcategorias = $subcategorias;
        $this->colunistas = $colunistas;
        $this->users = $users;
        $this->cs = $cs;
        $this->anuncios = $anuncios;
        $this->reacoes = $reacoes;
        $this->acessos = $acessos;
        $this->reacoesPostagens = $reacoesPostagens;
        $this->gate = 'SECRETARIA';
    }

    public function coluna() {
        $blogs = 'social';
        /* opções a cerca das categorias */
        $subcategorias = $this->subcategorias
                        ->where('SUBCAT_SLUG', $blogs)->first();
        if ($subcategorias == null) {
            abort(404, 'Página não Existe!');
        }
        /* informações do colunista quando houver */
        $colunistas = $this->colunistas
                        ->leftJoin('users', 'users.id', 'user_id')
                        ->where('SUBCAT_CODIGO', $subcategorias->SUBCAT_CODIGO)
                        ->orderBy('COL_CODIGO', 'desc')->limit(1)->get();

        $dbCategorias = $this->subcategorias
                        ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                        ->where('SUBCAT_SLUG', $blogs)->get();

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
//                ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'TOPO-INTERNA'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
//                ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'TOPO-INTERNA'], ['CAT_CODIGO', 1]])
                ->orderBy('ANU_ORDEM', 'ASC')
                ->limit(1)
                ->get();

//        dd($bannerTopo);

        $bannerCentro = $this->anuncios
                        ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                        ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'CENTRO-INTERNA'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                        ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'CENTRO-INTERNA'], ['CAT_CODIGO', 1]])
                        ->orderBy('ANU_ORDEM', 'asc')->limit(1)->get();


        $bannerRodape = $this->anuncios
                        ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                        ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'RODAPE-INTERNA'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                        ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'RODAPE-INTERNA'], ['CAT_CODIGO', 1]])
                        ->orderBy('ANU_ORDEM', 'asc')->limit(1)->get();




        /*         * ****** anuncios  ********* */








        $foto = 'socialCardLili.jpg';
        Seo::set('title', '#TiViNaLili');
        Seo::set('description', 'Coluna Social do Portal O Girassol');
        Seo::set('keywords', 'Coluna da Lili, TiViNaLili, Coluna Social, Lili Bezerra');
        Seo::set('breadcrumblist', [
            ['title' => 'GIRASSOL', 'url' => 'http://www.ogirassol.com.br'],
            ['title' => 'Coluna Social', 'url' => 'http://www.ogirassol.com.br/coluna-social'],
            ['title' => "#TiViNaLili", 'url' => "http://www.ogirassol.com.br/coluna/social"],
        ]);

        Seo::set('global-title', 'O GIRASSOL');
        Seo::set('global-description', 'Coluna Social do Portal Girassol');

        Seo::set('logo-url', 'logo url');
        Seo::set('search-url', "http://www.ogirassol.com.br/coluna/social");
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
        Seo::set('og-image-url', "");
        Seo::set('og-image-type', 'image/jpeg');
        Seo::set('og-image-width', 1200);
        Seo::set('og-image-height', 630);



        //$raiz = url("/");
        $raiz = "http://www.ogirassol.com.br";
        $url = $raiz . '/coluna/social';
        $urlShort = Shorty::shorten($url);


        Seo::set('twitter-card', '');
        Seo::set('twitter-site', '@ogirassol');
        Seo::set('twitter-title', '#TiViNaLili');
        Seo::set('twitter-content', 'Coluna Social do Portal Girassol');
        Seo::set('twitter-description', "Coluna Social do Portal Girassol");
        Seo::set('twitter-image', "$foto");
        Seo::set('twitter-url', "$urlShort");
        Seo::set('twitter-card', "summary");

        /* reações e computação dos votos das postagens */
        $reacoes = $this->reacoes->where('REA_STATUS', 'ATIVO')->get();

        /* reações e computação dos votos das postagens */
        $reacoesPosts = DB::table('reacoes AS T1')
                        ->select('T1.*', 'colunas_sociais.CS_CODIGO as CODIGO', DB::raw("(SELECT COUNT(*) FROM reacoes_postagens AS T2 "
                                        . "WHERE T2.REA_CODIGO = T1.REA_CODIGO) AS VOTOS"))
                        ->distinct()
                        ->leftJoin('reacoes_postagens', 'reacoes_postagens.REA_CODIGO', 'T1.REA_CODIGO')
                        ->leftJoin('colunas_sociais', 'colunas_sociais.CS_CODIGO', 'reacoes_postagens.CS_CODIGO')
                        ->where('REA_STATUS', 'ATIVO')->get();

        $posts = $this->cs->orderBy('CS_CODIGO', 'desc')->paginate(2);













        return view('site.coluna-social.index', compact('posts', 'reacoes', 'reacoesPosts', 'colunistas', 'bannerTopo', 'bannerCentro', 'bannerRodape', 'bannersLateral'))
                        ->with('corFontePadrao', 'red');
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

    public function post($slug, $codigo) {
        $blogs = 'social';
        /* opções a cerca das categorias */
        $subcategorias = $this->subcategorias
                        ->where('SUBCAT_SLUG', $blogs)->first();
        if ($subcategorias == null) {
            abort(404, 'Página não Existe!');
        }
        /* informações do colunista quando houver */
        $colunistas = $this->colunistas
                        ->leftJoin('users', 'users.id', 'user_id')
                        ->where('SUBCAT_CODIGO', $subcategorias->SUBCAT_CODIGO)
                        ->orderBy('COL_CODIGO', 'desc')->limit(1)->get();


        $cs = $this->cs->where([['CS_SLUG', $slug], ['CS_CODIGO', $codigo]])->get();
        if (isset($titulo->CS_IMAGEM) && $titulo->CS_IMAGEM != '') {
            $foto = $titulo->CS_IMAGEM;
        } else {
            $foto = 'socialCard.jpg';
        }

        $dbCategorias = $this->subcategorias
                        ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                        ->where('SUBCAT_SLUG', $blogs)->get();
        $corCategoria = $subcategorias->CAT_CORTOPO;
        $corFonte = $subcategorias->CAT_CORFONTETOPO;



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
                        ->orderBy('ANU_ORDEM', 'asc')->limit(1)->get();

        $bannerCentro = $this->anuncios
                        ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                        ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'CENTRO-INTERNA'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                        ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'CENTRO-INTERNA'], ['CAT_CODIGO', 1]])
                        ->orderBy('ANU_ORDEM', 'asc')->limit(1)->get();


        $bannerRodape = $this->anuncios
                        ->leftJoin('posicoes_anuncios', 'posicoes_anuncios.POS_CODIGO', 'anuncios.POS_CODIGO')
                        ->where([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'RODAPE-INTERNA'], ['CAT_CODIGO', $subcategorias->CAT_CODIGO]])
                        ->orWhere([['ANU_DTTERMINO', '>', $date], ['POS_DESCRICAO', 'RODAPE-INTERNA'], ['CAT_CODIGO', 1]])
                        ->orderBy('ANU_ORDEM', 'asc')->limit(1)->get();




        /*         * ******* anuncios  ********* */






        $titulo = $this->cs->where([['CS_SLUG', $slug], ['CS_CODIGO', $codigo]])->first();


        Seo::set('title', $titulo->CS_TITULO);
        Seo::set('description', $titulo->CS_NOTINHA);
        Seo::set('keywords', 'Coluna da Lili, TiViNaLili, Coluna Social, Lili Bezerra');
        Seo::set('breadcrumblist', [
            ['title' => 'GIRASSOL', 'url' => 'http://www.ogirassol.com.br'],
            ['title' => 'Coluna Social', 'url' => 'http://www.ogirassol.com.br/coluna-social'],
            ['title' => "$titulo->CS_TITULO", 'url' => "http://www.ogirassol.com.br/coluna-social/$titulo->CS_SLUG/$titulo->CS_CODIGO"],
        ]);

        Seo::set('global-title', 'O GIRASSOL');
        Seo::set('global-description', 'Coluna Social do Portal Girassol');

        Seo::set('logo-url', 'logo url');
        Seo::set('search-url', "http://www.ogirassol.com.br/coluna-social/$titulo->CS_SLUG/$titulo->CS_CODIGO");
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
                                        . "WHERE T2.REA_CODIGO = T1.REA_CODIGO  AND T2.CS_CODIGO = $titulo->CS_CODIGO) AS VOTOS"))
                        ->where('REA_STATUS', 'ATIVO')->get();


        /* reações e computação dos votos das postagens */
        $reacoesPosts = DB::table('reacoes AS T1')
                        ->select('T1.*', 'colunas_sociais.CS_CODIGO as CODIGO', DB::raw("(SELECT COUNT(*) FROM reacoes_postagens AS T2 "
                                        . "WHERE T2.REA_CODIGO = T1.REA_CODIGO) AS VOTOS"))
                        ->distinct()
                        ->leftJoin('reacoes_postagens', 'reacoes_postagens.REA_CODIGO', 'T1.REA_CODIGO')
                        ->leftJoin('colunas_sociais', 'colunas_sociais.CS_CODIGO', 'reacoes_postagens.CS_CODIGO')
                        ->where('REA_STATUS', 'ATIVO')->get();







        $posts = $this->cs->where('CS_CODIGO', '<>', $titulo->CS_CODIGO)
                        ->orderBy('CS_CODIGO', 'desc')->paginate(2);













        return view('site.coluna-social.interna', compact('posts', 'cs', 'reacoes', 'reacoesPosts', 'colunistas', 'bannerTopo', 'bannerCentro', 'bannerRodape', 'bannersLateral'))
                        ->with('corFontePadrao', 'red');
    }

}
