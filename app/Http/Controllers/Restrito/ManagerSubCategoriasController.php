<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\SubCategorias;
use App\Models\Restrito\Categorias;
use Gate;

class ManagerSubCategoriasController extends StandardController {

    protected $model;
    protected $categorias;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.manager-subcategoria';
    protected $redirectIndex = '/restrito/posts/subcategorias';

    public function __construct(SubCategorias $model, Categorias $categorias, Request $request) {
        $this->model = $model;
        $this->categorias = $categorias;
        $this->request = $request;
        $this->page = "posts/subcategorias";
        $this->titulo = "GERENCIAMENTO DAS SUBCATEGORIAS";
        $this->gate = 'SECRETARIA';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')->get();
        return view("{$this->nomeView}.index", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrar() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $categorias = $this->categorias->orderBy('CAT_TITULO', 'asc')->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('categorias'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();

        $title = str_slug($dadosForm['SUBCAT_TITULO'], '-');
        $slug = array('SUBCAT_SLUG' => $title);
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

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->find($id);
        $categorias = $this->categorias->orderBy('CAT_TITULO', 'asc')->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'categorias'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editarDB($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();

        $title = str_slug($dadosForm['SUBCAT_TITULO'], '-');
        $slug = array('SUBCAT_SLUG' => $title);
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
