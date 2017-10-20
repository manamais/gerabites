<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Colunistas;
use App\User;
use App\Models\Restrito\SubCategorias;
use Gate;

class UsuariosColunistasController extends StandardController {

    protected $model;
    protected $users;
    protected $subcategorias;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.usuarios-colunistas';
    protected $redirectIndex = '/restrito/colunistas';

    public function __construct(Colunistas $model, User $user, SubCategorias $subcategorias, Request $request) {
        $this->model = $model;
        $this->users = $user;
        $this->subcategorias = $subcategorias;
        $this->request = $request;
        $this->page = "colunistas";
        $this->titulo = "COLUNISTAS DO SITE";
        $this->gate = 'GERENCIAMENTO-USUARIOS';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                ->leftJoin('users', 'users.id', 'user_id')
                ->leftJoin('subcategorias', 'subcategorias.SUBCAT_CODIGO', 'colunistas.SUBCAT_CODIGO')
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
        $users = $this->users->where('tipo', 'COL')->get();
        $blogs = $this->subcategorias->where('CAT_CODIGO', 2)->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('blogs', 'users'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $users = $this->users->where('tipo', 'COL')->get();
        $blogs = $this->subcategorias->where('CAT_CODIGO', 2)->get();
        $data = $this->model->find($id);
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'blogs', 'users'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

}
