<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\ConfigMidiasSociais;
use Gate;

class ConfigMidiasSociaisController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-midias';
    protected $redirectIndex = '/restrito/configuracoes-midias';

    public function __construct(ConfigMidiasSociais $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "configuracoes-midias";
        $this->titulo = "CONFIGURAÇÕES DE MÍDIAS SOCIAIS";
        $this->gate = 'SECRETARIA';
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $dadosForm = $this->request->all();
        if (isset($dadosForm['MS_APP_PASSW'])) {
            $pass = array('MS_APP_PASSW' => bcrypt($dadosForm['MS_APP_PASSW']));
            $dadosForm = array_merge($dadosForm, $pass);
        }
        
        
        $validator = validator($dadosForm, $this->model->rules);
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

        $passAPI = $this->model->where([['MS_CODIGO', $id]])->first();

        $dadosForm = $this->request->all();

        if (isset($dadosForm['MS_APP_PASSW']) && $dadosForm['MS_APP_PASSW'] != '') {
            $pass = array('MS_APP_PASSW' => bcrypt($dadosForm['MS_APP_PASSW']));
        } else {
            $pass = array('MS_APP_PASSW' => $passAPI->MS_APP_PASSW);
        }

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = array_merge($dadosForm, $pass);

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
