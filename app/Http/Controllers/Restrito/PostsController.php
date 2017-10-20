<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Posts;
use App\Models\Restrito\Categorias;
use App\Models\Restrito\SubCategorias;
use App\Models\Restrito\Posicoes;
use App\User;
use Gate;
use Image;
use Auth;
use DB;

class PostsController extends StandardController {

    protected $model;
    protected $categorias;
    protected $subcategorias;
    protected $posicoes;
    protected $users;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts';
    protected $redirectIndex = '/restrito/posts';

    public function __construct(Posts $model, Categorias $categorias, SubCategorias $subcategorias, Posicoes $posicoes, User $users, Request $request) {
        $this->model = $model;
        $this->categorias = $categorias;
        $this->subcategorias = $subcategorias;
        $this->posicoes = $posicoes;
        $this->users = $users;
        $this->request = $request;
        $this->page = "posts";
        $this->titulo = "GERENCIAMENTO DOS POSTS";
        $this->gate = 'CRIACAO-POSTAGEM';
    }

    public function index() {
        $meuID = Auth::user()->id;
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'posts.SUBCAT_CODIGO')
                ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                ->leftJoin('posicoes', 'posicoes.POS_CODIGO', 'posts.POS_CODIGO')
                ->orderBy('POST_CODIGO', 'desc')
                ->get();
        return view("{$this->nomeView}.index", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

}