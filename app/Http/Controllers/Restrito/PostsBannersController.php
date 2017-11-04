<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Banners;
use App\Models\Restrito\PosicoesBanners;
use App\Models\Restrito\Categorias;
use App\User;
use Gate;
use Image;

//use Illuminate\Validation\Rule;

class PostsBannersController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-banner';
    protected $redirectIndex = '/restrito/posts/banners';

    public function __construct(Banners $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "posts/banners";
        $this->titulo = "GERENCIAMENTO DOS BANNERS";
        $this->gate = 'SECRETARIA';
    }


    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $imagem = $this->request->file('BAN_IMAGEM');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['BAN_IMAGEM' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('BAN_IMAGEM' => $imagem);
                $validator = validator($imagemArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    //dd('nao encontrou falhas');
                    $final = date('YmdHms');
                    $nome = str_slug($dadosForm['BAN_NOME'], '-');
                    $nomeArquivo = $nome . "_$final";
                    $path = public_path('assets/img/banners/');

                    $extensao = $imagem->getClientOriginalExtension();
                    $image = Image::make($imagem)->encode($extensao);
                    $image->save($path . "$nomeArquivo.$extensao");

                    $imagem = array('BAN_IMAGEM' => "$nomeArquivo.$extensao");
                    $dadosForm = array_merge($dadosForm, $imagem);
                }
            } else {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
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

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();

        $imagem = $this->request->file('BAN_IMAGEM');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['BAN_IMAGEM' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('BAN_IMAGEM' => $imagem);
                $validator = validator($imagemArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    //dd('nao encontrou falhas');
                    $final = date('YmdHms');
                    $nome = str_slug($dadosForm['BAN_NOME'], '-');
                    $nomeArquivo = $nome . "_$final";
                    $path = public_path('assets/img/banners/');

                    $extensao = $imagem->getClientOriginalExtension();
                    $image = Image::make($imagem)->encode($extensao);
                    $image->save($path . "$nomeArquivo.$extensao");

                    $imagem = array('BAN_IMAGEM' => "$nomeArquivo.$extensao");
                    $dadosForm = array_merge($dadosForm, $imagem);
                }
            } else {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        }

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
