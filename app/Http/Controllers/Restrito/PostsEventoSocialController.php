<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\EventosSociais;
use Gate;

class PostsEventoSocialController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-coluna-social';
    protected $redirectIndex = '/restrito/evento-social';

    public function __construct(EventosSociais $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "coluna-social";
        $this->titulo = "EVENTOS";
        $this->gate = 'GERENCIAMENTO-COLUNA-SOCIAL';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->where('ES_CODIGO','>',1)
                ->get();
        return view("{$this->nomeView}.evento-index", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrar() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        return view("{$this->nomeView}.evento-cadastrar-editar")
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->find($id);
        return view("{$this->nomeView}.evento-cadastrar-editar", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

}
