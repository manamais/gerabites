<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Artigos;
use Gate;

class PostsArtigosController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-artigo';
    protected $redirectIndex = '/restrito/artigos';

    public function __construct(Artigos $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "artigos";
        $this->titulo = "GERENCIAMENTO DOS ARTIGOS";
        $this->gate = 'SECRETARIA';
    }


}
