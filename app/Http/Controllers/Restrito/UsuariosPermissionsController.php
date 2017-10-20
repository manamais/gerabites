<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Permission;

class UsuariosPermissionsController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.usuarios-permissions';
    protected $redirectIndex = '/restrito/permissoes';

    public function __construct(Permission $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "permissoes";
        $this->titulo = "PERMISSÕES NO SISTEMA";
        $this->gate = 'SUPERADMIN';
    }

}
