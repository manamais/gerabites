<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Videos;
use Gate;

class PostsVideosController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.posts-video';
    protected $redirectIndex = '/restrito/videos';

    public function __construct(Videos $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "videos";
        $this->titulo = "GERENCIAMENTO DOS VIDEOS";
        $this->gate = 'SECRETARIA';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->all();
        
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
        $url = $dadosForm['VID_URL'];
        $youtube = 'https://www.youtube.com/';
        $vimeo = 'https://vimeo.com/';


        $yt = strripos($url, $youtube);
        $vm = strripos($url, $vimeo);

        if (($yt === false) && ($vm === false)) {
            alert()->warning('Link inválido. Poste somente endereços do "youtube ou vimeo".')->autoclose(5500);
            return redirect()->back()
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
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
      
        $url = $dadosForm['VID_URL'];
        $youtube = 'https://www.youtube.com/';
        $vimeo = 'https://vimeo.com/';

        $yt = strripos($url, $youtube);
        $vm = strripos($url, $vimeo);

        if (($yt === false) && ($vm === false)) {
            alert()->warning('Link inválido. Poste somente endereços do "youtube ou vimeo".')->autoclose(5500);
            return redirect()->back()
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
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
