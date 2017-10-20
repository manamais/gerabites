<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Restrito\Posts;
use App\Models\Restrito\ColunasSociais;
use App\Models\Restrito\Reacoes;
use App\Models\Restrito\ReacoesPostagens;

class ReacoesController extends Controller {

    protected $users;
    protected $posts;
    protected $colunaSocial;
    protected $reacoes;
    protected $reacoesPostagens;
    protected $gate;

    public function __construct(User $users, Posts $posts, ColunasSociais $colunaSocial, 
            Reacoes $reacoes, ReacoesPostagens $reacoesPostagens) {

        $this->users = $users;
        $this->posts = $posts;
        $this->colunaSocial = $colunaSocial;
        $this->reacoes = $reacoes;
        $this->reacoesPostagens = $reacoesPostagens;
        $this->gate = 'SECRETARIA';
    }

    public function votar($reacao, $post) {

        $post = $this->posts->where('POST_SLUG', $post)->first();
        $codPost = $post->POST_CODIGO;

        /* recuperar o IP do usuario */
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        /* recuperar o IP do usuario */

        $reacoesPost = $this->reacoesPostagens->where([['POST_CODIGO', $codPost], ['RP_IP', $ipaddress]])->get();
        $qtdVotosIP = $reacoesPost->count();

        if ($qtdVotosIP < 5) {
            /* codigo pra inserir o voto da reação - não esquecer do alert */
            $dadosVotos = array();
            $cr = array('REA_CODIGO' => $reacao);
            $dadosVotos = array_merge($dadosVotos, $cr);
            $cp = array('POST_CODIGO' => $codPost);
            $dadosVotos = array_merge($dadosVotos, $cp);
            $ip = array('RP_IP' => $ipaddress);
            $dadosVotos = array_merge($dadosVotos, $ip);

            $insert = $this->reacoesPostagens->create($dadosVotos);
            if ($insert) {
                alert()->success('', 'Voto Computado!');
                return redirect(url()->previous());
            } else {
                alert()->error('Por favor, informe esse erro em nosso formulário de contato.', 'Erro ao Votar!')->autoclose(4500);
                return redirect(url()->previous());
            }
        } else {
            alert()->warning('Seus votos para este post chegou ao limite por IP. Você pode votar em outros!', 'Voto não computado!')->autoclose(4500);
            return redirect(url()->previous());
        }






















        return view($view, compact('dbCategorias', 'colunistas', 'bannerTopo', 'posts', 'bannersLateral', 'destaque', 'lateralDestaque', 'lateral3'))
                        ->with('titulo', $subcategorias->SUBCAT_TITULO)
                        ->with('corCategoria', $corCategoria)
                        ->with('corFonte', $corFonte)
                        ->with('corFontePadrao', $corFontePadrao)
                        ->with('corTopo', $corTopo)
                        ->with('corFonteTopo', $corFonteTopo);
    }
    
    public function votarCS($reacao, $post, $id) {

        $cs = $this->colunaSocial->where([['CS_SLUG', $post], ['CS_CODIGO', $id]])->first();
        $codPost = $cs->CS_CODIGO;

        /* recuperar o IP do usuario */
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        /* recuperar o IP do usuario */

        $reacoesPost = $this->reacoesPostagens->where([['CS_CODIGO', $codPost], ['RP_IP', $ipaddress]])->get();
        $qtdVotosIP = $reacoesPost->count();

        if ($qtdVotosIP < 5) {
            /* codigo pra inserir o voto da reação - não esquecer do alert */
            $dadosVotos = array();
            $cr = array('REA_CODIGO' => $reacao);
            $dadosVotos = array_merge($dadosVotos, $cr);
            $cp = array('CS_CODIGO' => $codPost);
            $dadosVotos = array_merge($dadosVotos, $cp);
            $ip = array('RP_IP' => $ipaddress);
            $dadosVotos = array_merge($dadosVotos, $ip);

            $insert = $this->reacoesPostagens->create($dadosVotos);
            if ($insert) {
                alert()->success('', 'Voto Computado!');
                return redirect(url()->previous());
            } else {
                alert()->error('Por favor, informe esse erro em nosso formulário de contato.', 'Erro ao Votar!')->autoclose(4500);
                return redirect(url()->previous());
            }
        } else {
            alert()->warning('Seus votos para este post chegou ao limite por IP. Você pode votar em outros!', 'Voto não computado!')->autoclose(4500);
            return redirect(url()->previous());
        }






















        return view($view, compact('dbCategorias', 'colunistas', 'bannerTopo', 'posts', 'bannersLateral', 'destaque', 'lateralDestaque', 'lateral3'))
                        ->with('titulo', $subcategorias->SUBCAT_TITULO)
                        ->with('corCategoria', $corCategoria)
                        ->with('corFonte', $corFonte)
                        ->with('corFontePadrao', $corFontePadrao)
                        ->with('corTopo', $corTopo)
                        ->with('corFonteTopo', $corFonteTopo);
    }

}
