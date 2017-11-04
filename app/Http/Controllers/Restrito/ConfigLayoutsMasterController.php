<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\StandardController;
use App\Models\Restrito\Layouts;
use Illuminate\Http\Request;
use Gate;
//use Image;
use Intervention\Image\Facades\Image;

class ConfigLayoutsMasterController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-layouts-master';
    protected $redirectIndex = '/restrito/layouts-master';

    public function __construct(Layouts $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "layouts-master";
        $this->titulo = "CADASTRO DOS LAYOUTS";
        $this->gate = 'SECRETARIA';
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $ultimoID = $this->model->all()->last();
        if (isset($ultimoID) && $ultimoID != '') {
            $ultimoID = $ultimoID->LAY_CODIGO;
            $ultimoID = $ultimoID + 1;
        } else {
            $ultimoID = 1;
        }

        $dadosForm = $this->request->all();
        $foto = $this->request->file('LAY_IMAGEM');
        $nomeArquivo = "LAYOUT_$ultimoID";
        $path = public_path('assets/img/layouts/');
        $uploadImage = Image::make($foto)->encode('png')->save($path . "$nomeArquivo.png");

        $imagem = array('LAY_IMAGEM' => "$nomeArquivo.png");
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
        $foto = $this->request->file('LAY_IMAGEM');

        if ($foto != null) {
            $nomeArquivo = "LAYOUT_$id";
            $path = public_path('assets/img/layouts/');
            $uploadImage = Image::make($foto)->encode('png')->save($path . "$nomeArquivo.png");

            $imagem = array('LAY_IMAGEM' => "$nomeArquivo.png");
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
