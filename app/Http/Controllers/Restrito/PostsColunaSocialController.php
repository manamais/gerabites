<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\ColunasSociais;
use App\Models\Restrito\EventosSociais;
use Gate;
use Image;
use Illuminate\Validation\Rule;

class PostsColunaSocialController extends StandardController {

    protected $model;
    protected $evento;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-coluna-social';
    protected $redirectIndex = '/restrito/coluna-social';

    public function __construct(ColunasSociais $model, EventosSociais $evento, Request $request) {
        $this->model = $model;
        $this->evento = $evento;
        $this->request = $request;
        $this->page = "coluna-social";
        $this->titulo = "COLUNA SOCIAL";
        $this->gate = 'GERENCIAMENTO-COLUNA-SOCIAL';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->leftJoin('eventos_sociais', 'eventos_sociais.ES_CODIGO', 'colunas_sociais.ES_CODIGO')
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
        $eventos = $this->evento->all();
        return view("{$this->nomeView}.cadastrar-editar", compact('eventos'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $title = str_slug($dadosForm['CS_TITULO'], '-');
        $slug = array('CS_SLUG' => $title);
        $dadosForm = array_merge($dadosForm, $slug);
        $imagem = $this->request->file('CS_IMAGEM');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['CS_IMAGEM' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('CS_IMAGEM' => $imagem);
                $validator = validator($imagemArray, $regras);
                
                 
          if( $validator->fails() ) {
          $messages = $validator->messages();
          return $messages;
          }
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
                    $nomeArquivo = "COLUNA-SOCIAL_$final";
                    $path = public_path('assets/public/images/coluna-social/');
                    $pathThumb = public_path('assets/public/images/thumbs/coluna-social/');
                    $image = Image::make($imagem)->encode('jpg');
                    $imageThumb = Image::make($imagem)->encode('jpg');
                    $imageOriginal = $image->resize(770, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imageOriginal->save($path . "$nomeArquivo.jpg");

                    $imageThumb = $imageThumb->resize(180, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })->crop(100, 100);
                    $imageThumb->save($pathThumb . "$nomeArquivo.jpg");

                    $imagem = array('CS_IMAGEM' => "$nomeArquivo.jpg");
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
        $eventos = $this->evento->all();
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'eventos'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editarDB($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $title = str_slug($dadosForm['CS_TITULO'], '-');
        $slug = array('CS_SLUG' => $title);
        $dadosForm = array_merge($dadosForm, $slug);
        $imagem = $this->request->file('CS_IMAGEM');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['CS_IMAGEM' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('CS_IMAGEM' => $imagem);
                $validator = validator($imagemArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    $final = date('YmdHms');
                    $nomeArquivo = "COLUNA-SOCIAL_$final";

                    $path = public_path('assets/public/images/coluna-social/');
                    $pathThumb = public_path('assets/public/images/thumbs/coluna-social/');
                    $image = Image::make($imagem)->encode('jpg');
                    $imageThumb = Image::make($imagem)->encode('jpg');
                    $imageOriginal = $image->resize(770, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imageOriginal->save($path . "$nomeArquivo.jpg");

                    $imageThumb = $imageThumb->resize(180, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })->crop(100, 100);
                    $imageThumb->save($pathThumb . "$nomeArquivo.jpg");

                    $imagem = array('CS_IMAGEM' => "$nomeArquivo.jpg");
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
