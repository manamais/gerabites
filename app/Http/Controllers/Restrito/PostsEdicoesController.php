<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Edicoes;
use Gate;
use Auth;
use DB;

class PostsEdicoesController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-edicoes';
    protected $redirectIndex = '/restrito/edicoes';

    public function __construct(Edicoes $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "edicoes";
        $this->titulo = "GERENCIAMENTO DA VERSÃO IMPRESSA";
        $this->gate = 'GERENCIAMENTO-VERSAO-IMPRESSA';
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $edicao = $dadosForm['VI_NUMERO'];

        $pdf = $this->request->file('VI_PDF');
        $extensao = strtolower($pdf->getClientOriginalExtension());

        if (isset($pdf) && $pdf != null && $extensao == 'pdf') {
            if ($pdf->isValid()) {
                $path = public_path('assets/public/versao-impressa/');

                $name = "Girassol_$edicao.pdf";
                $upload = $pdf->move($path, $name);
            } else {
                alert()->error('O arquivo PDF escolhido não é válido!', 'Falha na inserção!')->autoclose(4500);
                return redirect()->back()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        } else {
            alert()->error('O arquivo PDF escolhido não é válido!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }

        $pdf = array('VI_PDF' => $name);
        $dadosForm = array_merge($dadosForm, $pdf);


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
        $edicao = $dadosForm['VI_NUMERO'];

        $pdf = $this->request->file('VI_PDF');

        if (isset($pdf) && $pdf != null) {
            $extensao = strtolower($pdf->getClientOriginalExtension());
            if ($pdf->isValid() && $extensao == 'pdf') {
                $path = public_path('assets/public/versao-impressa/');

                $name = "Girassol_$edicao.pdf";
                $upload = $pdf->move($path, $name);

                $pdf = array('VI_PDF' => $name);
                $dadosForm = array_merge($dadosForm, $pdf);
            } else {
                alert()->error('O arquivo PDF escolhido não é válido!', 'Falha na inserção!')->autoclose(4500);
                return redirect()->back()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        } else {
            $edition = $this->model->find($id);
            $pdf = array('VI_PDF' => $edition->VI_PDF);
            $dadosForm = array_merge($dadosForm, $pdf);
        }




        $validator = validator($dadosForm, $rulesTratada);

        /*
          if( $validator->fails() ) {
          $messages = $validator->messages();
          return $messages;
          }
         */












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
