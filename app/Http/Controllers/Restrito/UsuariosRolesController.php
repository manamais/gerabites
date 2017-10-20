<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Role;

class UsuariosRolesController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.usuarios-roles';
    protected $redirectIndex = '/restrito/papeis';

    public function __construct(Role $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "papeis";
        $this->titulo = "PERFIS/PAPÉIS NO SISTEMA";
        $this->gate = 'SUPERADMIN';
    }

}
