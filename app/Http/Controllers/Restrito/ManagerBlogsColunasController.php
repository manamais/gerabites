<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\BlogsColunas;
use App\User;
use Gate;

class ManagerBlogsColunasController extends StandardController {

    protected $model;
    protected $user;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.manager-blog-coluna';
    protected $redirectIndex = '/restrito/blogs-colunas';

    public function __construct(BlogsColunas $model, User $user, Request $request) {
        $this->model = $model;
        $this->user = $user;
        $this->request = $request;
        $this->page = "blogs-colunas";
        $this->titulo = "GERENCIAMENTO DOS BLOGS E COLUNAS";
        $this->gate = 'SECRETARIA';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->leftJoin('users','users.id','user_id')
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
        $usuarios = $this->user->where('tipo','COLUNISTA')->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('usuarios'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $usuarios = $this->user->where('tipo','COLUNISTA')->get();
        $data = $this->model->find($id);
        return view("{$this->nomeView}.cadastrar-editar", compact('data','usuarios'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();

        $title = str_slug($dadosForm['BC_NOME'], '-');
        $slug = array('BC_SLUG' => $title);
        $dadosForm = array_merge($dadosForm, $slug);

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

    public function editarDB($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();

        $title = str_slug($dadosForm['BC_NOME'], '-');
        $slug = array('BC_SLUG' => $title);
        $dadosForm = array_merge($dadosForm, $slug);

        $validator = validator($dadosForm, $rulesTratada);


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
            $item = $this->model->find($id);
            $update = $item->update($dadosForm);
        }

        if ($update) {
            alert()->success('', 'Registro alterado!');
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

}
