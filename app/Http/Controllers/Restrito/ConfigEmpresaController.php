<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Empresa;

class ConfigEmpresaController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-empresa';
    protected $redirectIndex = '/restrito/empresas';

    public function __construct(Empresa $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "empresas";
        $this->titulo = "CONFIGURAÇÕES DA EMPRESA";
        $this->gate = 'SECRETARIA';
    }

}
