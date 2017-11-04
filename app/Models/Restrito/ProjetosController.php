<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Projetos;
use App\Models\Restrito\Empresa;
use App\Models\Restrito\Tarefas;
use App\Models\Restrito\Comentarios;
use Gate;

class ProjetosController extends StandardController {

    protected $model;
    protected $empresas;
    protected $comentarios;
    protected $tarefas;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.projetos';
    protected $redirectIndex = '/restrito/projetos';

    public function __construct(Projetos $model, Empresa $empresas, Comentarios $comentarios, Tarefas $tarefas, Request $request) {
        $this->model = $model;
        $this->empresas = $empresas;
        $this->comentarios = $comentarios;
        $this->tarefas = $tarefas;
        $this->request = $request;
        $this->page = "projetos";
        $this->titulo = "CONFIGURAÇÕES DOS PROJETOS";
        $this->gate = 'SECRETARIA';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->leftJoin('empresas', 'empresas.EMPR_CODIGO', 'projetos.EMPR_CODIGO')
                ->get();
        return view("{$this->nomeView}.index", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrar() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $empresas = $this->empresas->where('EMPR_CODIGO', '<>', 1)->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('empresas'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->find($id);
        $empresas = $this->empresas->where('EMPR_CODIGO', '<>', 1)->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'empresas'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function view($id) {
        $projetos = $this->model->find($id);
        $nomeProjeto = $projetos->PROJ_NOME;
        
        $data = $this->model->find($id);
        $tarefas = $this->tarefas->where('PROJ_CODIGO',$projetos->PROJ_CODIGO)->get();
        $comentarios = $this->comentarios->where('PROJ_CODIGO',$projetos->PROJ_CODIGO)->get();
        
        return view("{$this->nomeView}.view", compact('data'))
                        ->with('nomeProjeto', $nomeProjeto)
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

}
