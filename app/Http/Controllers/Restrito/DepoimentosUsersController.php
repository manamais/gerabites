<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Depoimentos;
use Gate;
use Auth;

class DepoimentosUsersController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.depoimentos-usuarios';
    protected $redirectIndex = '/restrito/depoimentos';

    public function __construct(Depoimentos $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "depoimentos";
        $this->titulo = "DEPOIMENTOS";
        $this->gate = 'SECRETARIA';
    }

    public function index() {
//        $gate = $this->gate;
//        if (Gate::denies("$gate")) {
//            abort(403, 'Não Autorizado!');
//        }
        $data = $this->model
                ->where('user_id', Auth::user()->id)
                ->get();
        return view("{$this->nomeView}.index", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();

        $user_id = array('user_id' => Auth::user()->id);
        $dadosForm = array_merge($dadosForm, $user_id);
        $status = array('DEP_STATUS' => 'STANDBY');
        $dadosForm = array_merge($dadosForm, $status);

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

        $user_id = array('user_id' => Auth::user()->id);
        $dadosForm = array_merge($dadosForm, $user_id);
        $status = array('DEP_STATUS' => 'STANDBY');
        $dadosForm = array_merge($dadosForm, $status);

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

    public function deletar($id) {
        $item = $this->model->find($id);
        if ($item->DEP_STATUS != 'STANDBY') {
            abort(403, 'Não Autorizado!');
        } else {
            $gate = $this->gate;
            if (Gate::denies("$gate")) {
                abort(403, 'Não Autorizado!');
            }
            $deleta = $item->delete();
        }

        if ($deleta) {
            return '1';
        } else {
            alert()->error('Pressione F5 e verifique se o arquivo continua na lista. Caso o erro persista, entre em contato com a Administração.', 'Erro na exclusÃ£o!')->autoclose(4500);
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

}
