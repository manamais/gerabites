<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Posicoes;
use Gate;
use Image;

class ManagerPosicoesController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.manager-posicao';
    protected $redirectIndex = '/restrito/posicoes';

    public function __construct(Posicoes $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "posicoes";
        $this->titulo = "DISPOSIÇÃO DAS NOTÍCIAS";
        $this->gate = 'SECRETARIA';
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $foto = $this->request->file('POS_IMAGEM');
        $final = date('YmdHms');
        $nomeArquivo = "POS_NOTICIA_$final";
        $path = public_path('assets/restrict/images/layouts/');
        $uploadImage = Image::make($foto)->encode('png')->save($path . "$nomeArquivo.png");

        $imagem = array('POS_IMAGEM' => "$nomeArquivo.png");
        $dadosForm = array_merge($dadosForm, $imagem);

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

        $dadosForm = $this->request->all();
        $foto = $this->request->file('POS_IMAGEM');

        if ($foto != null) {
            $final = date('YmdHms');
            $nomeArquivo = "POS_NOTICIA_$final";
            $path = public_path('assets/restrict/images/layouts/');
            $uploadImage = Image::make($foto)->encode('png')->save($path . "$nomeArquivo.png");

            $imagem = array('POS_IMAGEM' => "$nomeArquivo.png");
            $dadosForm = array_merge($dadosForm, $imagem);
        }

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);

        $validator = validator($dadosForm, $rulesTratada);

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
