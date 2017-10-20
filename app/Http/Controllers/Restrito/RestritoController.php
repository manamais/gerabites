<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\StandardController;
use App\User;

class RestritoController extends StandardController {

    protected $model;
    protected $nomeView = 'restrito._home';
    protected $gate;
    protected $page;

    public function __construct(User $user) {
        $this->model = $user;
        $this->page = 'home';
        $this->titulo = 'e-Jornal';
        $this->middleware('auth');
    }

    public function index() {
        return view("{$this->nomeView}.index")
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

}
