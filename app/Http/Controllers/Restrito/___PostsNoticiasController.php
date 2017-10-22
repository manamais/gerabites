<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Posts;
use App\Models\Restrito\Categorias;
use App\Models\Restrito\SubCategorias;
use App\Models\Restrito\Posicoes;
use App\User;
use Gate;
use Image;
use Auth;
use DB;

class PostsNoticiasController extends StandardController {

    protected $model;
    protected $categorias;
    protected $subcategorias;
    protected $posicoes;
    protected $users;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-noticias';
    protected $redirectIndex = '/restrito/noticias';

    public function __construct(Posts $model, Categorias $categorias, SubCategorias $subcategorias, Posicoes $posicoes, User $users, Request $request) {
        $this->model = $model;
        $this->categorias = $categorias;
        $this->subcategorias = $subcategorias;
        $this->posicoes = $posicoes;
        $this->users = $users;
        $this->request = $request;
        $this->page = "noticias";
        $this->titulo = "GERENCIAMENTO DAS NOTÍCIAS";
        $this->gate = 'CRIACAO-POSTAGEM';
    }

    public function index() {
        $meuID = Auth::user()->id;
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'posts.SUBCAT_CODIGO')
                ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                ->leftJoin('posicoes', 'posicoes.POS_CODIGO', 'posts.POS_CODIGO')
                ->orderBy('POST_CODIGO', 'desc')
                ->where('user_id', $meuID)
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
        $subcategorias = $this->subcategorias
                ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                ->where('SUBCAT_CODIGO', '>', 1)
                ->get();
        $posicoes = $this->posicoes->all();

        return view("{$this->nomeView}.cadastrar-editar", compact('subcategorias', 'posicoes'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $subcategorias = $this->subcategorias
                ->leftJoin('categorias', 'categorias.CAT_CODIGO', 'subcategorias.CAT_CODIGO')
                ->where('SUBCAT_CODIGO', '>', 1)
                ->get();
        $posicoes = $this->posicoes->all();


        $data = $this->model->find($id);
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'subcategorias', 'posicoes'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        if (isset($dadosForm['POST_DTINICIO']) && $dadosForm['POST_DTINICIO'] == '') {
            unset($dadosForm['POST_DTINICIO']);
        }
        $title = str_slug($dadosForm['POST_TITULO'], '-');
        $slug = array('POST_SLUG' => $title);
        $dadosForm = array_merge($dadosForm, $slug);
        $user_id = array('user_id' => Auth::user()->id);
        $dadosForm = array_merge($dadosForm, $user_id);
        $slug = $this->model->find($id);
        $slug = array('POST_SLUG' => $slug->POST_SLUG);
        $dadosForm = array_merge($dadosForm, $slug);

        $imagem = $this->request->file('POST_IMAGE');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['POST_IMAGE' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('POST_IMAGE' => $imagem);
                $validator = validator($imagemArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    $data = date('YmdHms');
                    $nomeArquivo = $data." - ".$dadosForm['POST_TITULO'];
                    $path = public_path('assets/public/images/fotos/');
                    $pathThumb = public_path('assets/public/images/thumbs/');

                    $image = Image::make($imagem)->encode('jpg');
                    $image->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image->fit('1200', '630');
                    $image->save($path . "$nomeArquivo.jpg");

                    $imgThumb = $image->resize(400, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imgThumb->save($pathThumb . "$nomeArquivo.jpg");

                    $imagem = array('POST_IMAGE' => "$nomeArquivo.jpg");
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

        if (isset($dadosForm['POST_DTINICIO']) && $dadosForm['POST_DTINICIO'] == '') {
            unset($dadosForm['POST_DTINICIO']);
        }
        

        $imagem = $this->request->file('POST_IMAGE');

        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['POST_IMAGE' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('POST_IMAGE' => $imagem);
                $validator = validator($imagemArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    $data = date('YmdHms');
                    $nomeArquivo = $data." - ".$dadosForm['POST_TITULO'];
                    $path = public_path('assets/public/images/fotos/');
                    $pathThumb = public_path('assets/public/images/thumbs/');

                    $image = Image::make($imagem)->encode('jpg');
                    $image->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image->fit('1200', '630');
                    $image->save($path . "$nomeArquivo.jpg");

                    $imgThumb = $image->resize(400, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imgThumb->save($pathThumb . "$nomeArquivo.jpg");







                    $imagem = array('POST_IMAGE' => "$nomeArquivo.jpg");
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

        $autor = $this->model->find($id);
        $user_id = array('user_id' => $autor->user_id);
        $dadosForm = array_merge($dadosForm, $user_id);

        $validator = validator($dadosForm, $rulesTratada);

        /*
          if( $validator->fails() ) {
          $messages = $validator->messages();
          return $messages;
          }
         * 
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
