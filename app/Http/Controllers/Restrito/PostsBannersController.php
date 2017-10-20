<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Anuncios;
use App\Models\Restrito\PosicoesAnuncios;
use App\Models\Restrito\Categorias;
use App\User;
use Gate;
use Image;

//use Illuminate\Validation\Rule;

class PostsBannersController extends StandardController {

    protected $model;
    protected $posicoes;
    protected $categorias;
    protected $users;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-banner';
    protected $redirectIndex = '/restrito/banners';

    public function __construct(Anuncios $model, PosicoesAnuncios $posicoes, Categorias $categorias, User $users, Request $request) {
        $this->model = $model;
        $this->posicoes = $posicoes;
        $this->categorias = $categorias;
        $this->users = $users;
        $this->request = $request;
        $this->page = "banners";
        $this->titulo = "GERENCIAMENTO DOS ANÚNCIOS";
        $this->gate = 'SECRETARIA';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $clientes = $this->users->get();
        $data = $this->model->get();

        return view("{$this->nomeView}.index", compact('data','clientes'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrar() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $posicoes = $this->posicoes->all();
        $categorias = $this->categorias->all();
        $clientes = $this->users->where([['tipo', '<>', 'LEI'], ['id', '>', 2]])->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('posicoes', 'categorias', 'clientes'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $imagem = $this->request->file('ANU_IMAGEM');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['ANU_IMAGEM' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('ANU_IMAGEM' => $imagem);
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
                    $nome = str_slug($dadosForm['ANU_NOME'], '-');
                    $nomeArquivo = $nome . "_$final";
                    $path = public_path('assets/public/images/publicidades/');

                    $extensao = $imagem->getClientOriginalExtension();
                    $image = Image::make($imagem)->encode($extensao);
                    $image->save($path . "$nomeArquivo.$extensao");

                    $imagem = array('ANU_IMAGEM' => "$nomeArquivo.$extensao");
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

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->find($id);
        $posicoes = $this->posicoes->all();
        $categorias = $this->categorias->all();
        $clientes = $this->users->where([['tipo', '<>', 'LEI'], ['id', '>', 2]])->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'posicoes', 'categorias', 'clientes'))
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

        $imagem = $this->request->file('ANU_IMAGEM');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['ANU_IMAGEM' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('ANU_IMAGEM' => $imagem);
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
                    $nome = str_slug($dadosForm['ANU_NOME'], '-');
                    $nomeArquivo = $nome . "_$final";
                    $path = public_path('assets/public/images/publicidades/');

                    $extensao = $imagem->getClientOriginalExtension();
                    $image = Image::make($imagem)->encode($extensao);
                    $image->save($path . "$nomeArquivo.$extensao");

                    $imagem = array('ANU_IMAGEM' => "$nomeArquivo.$extensao");
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
