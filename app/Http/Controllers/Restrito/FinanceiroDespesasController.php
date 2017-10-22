<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\DebitosTipo;
use App\Models\Restrito\Debitos;
use Gate;

class FinanceiroDespesasController extends StandardController {

    protected $model;
    protected $categorias;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.financeiro-depesas';
    protected $redirectIndex = '/restrito/despesas';

    public function __construct(Debitos $model, DebitosTipo $tipo, Request $request) {
        $this->model = $model;
        $this->categorias = $tipo;
        $this->request = $request;
        $this->page = "despesas";
        $this->titulo = "GERENCIAMENTO DAS DESPESAS";
        $this->gate = 'SECRETARIA';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->leftJoin('tipos_debitos', 'tipos_debitos.TD_CODIGO', 'debitos.TD_CODIGO')
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
        $tipos = $this->categorias->all();
        return view("{$this->nomeView}.cadastrar-editar", compact('tipos'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        if (isset($dadosForm['DEB_DTPAGAMENTO']) && $dadosForm['DEB_DTPAGAMENTO'] == '') {
            unset($dadosForm['DEB_DTPAGAMENTO']);
        }
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
        $tipos = $this->categorias->all();
        $data = $this->model->find($id);
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'tipos'))
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
        if (isset($dadosForm['DEB_DTPAGAMENTO']) && $dadosForm['DEB_DTPAGAMENTO'] == '') {
            unset($dadosForm['DEB_DTPAGAMENTO']);
        }

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
