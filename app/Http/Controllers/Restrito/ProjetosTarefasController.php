<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Etapas;
use App\Models\Restrito\Projetos;
use App\Models\Restrito\Produtos;
use App\User;
use Gate;
use Carbon;

class ProjetosTarefasController extends StandardController {

    protected $model;
    protected $users;
    protected $projetos;
    protected $produtos;
    protected $etapas;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.projetos-tarefas';
    protected $redirectIndex = '/restrito/projetos/tarefas';

    public function __construct(Etapas $model, Projetos $projetos, Produtos $produtos, Etapas $etapas, User $users, Request $request) {
        $this->model = $model;
        $this->users = $users;
        $this->projetos = $projetos;
        $this->produtos = $produtos;
        $this->etapas = $etapas;
        $this->request = $request;
        $this->page = "projetos/tarefas";
        $this->titulo = "TAREFAS DO PROJETO";
        $this->gate = 'SECRETARIA';
    }

    public function tarefas($cod) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $projetos = $this->projetos->find($cod);
        $nomeProjeto = $projetos->PROJ_NOME;

        $data = $this->model->all();
        return view("{$this->nomeView}.index", compact('data'))
                        ->with('projeto', $nomeProjeto)
                        ->with('page', "projetos/$cod/tarefas")
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarTarefa($cod) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $users = $this->users->where('tipo', '<>', 'CLI')->get();
        $produtos = $this->produtos->all();
        $etapas = $this->etapas->all();
        return view("{$this->nomeView}.cadastrar-editar", compact('users', 'produtos', 'etapas'))
                        ->with('page', "projetos/$cod/tarefas")
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarTarefaDB($cod) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
//        $title = str_slug($dadosForm['POST_TITULO'], '-');
//        $codProjeto = array('POST_SLUG' => $title);
//        $dadosForm = array_merge($dadosForm, $slug);


//        $dtInicio_1 = explode(" ", $dtInicio_1);
//        $dtInvertida = last($dtInicio_1[0]);
//        $date = \Carbon\Carbon::parse($dtInvertida)->format('Y/m/d'); 

//        $data = substr($dadosForm['TAR_DTINICIO'], 0, 10);
//        $hora = substr($dadosForm['TAR_DTINICIO'], -8, -1);



        dd($dadosForm); // piece1




        $codProjeto = array('PROJ_CODIGO' => $cod);
        $dadosForm = array_merge($dadosForm, $codProjeto);


        dd($dadosForm);
        $validator = validator($dadosForm, $this->model->rules);

        /*
          if( $validator->fails() ) {
          $messages = $validator->messages();
          return $messages;
          }
         */
        if ($validator->fails()) {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $insert = $this->model->create($dadosForm);
        }

        if ($insert) {
            alert()->success('', 'Registro inserido!');
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

}
