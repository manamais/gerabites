<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\ConfigComportamentos;

class ConfigComportamentosController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-comportamento';
    protected $redirectIndex = '/restrito/configuracoes-comportamentos';

    public function __construct(ConfigComportamentos $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "configuracoes-comportamentos";
        $this->titulo = "CONFIGURAÇÕES DOS COMPORTAMENTOS";
        $this->gate = 'SECRETARIA';
    }

}
