<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Expediente;

class ConfigExpedientesController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-expediente';
    protected $redirectIndex = '/restrito/expedientes';

    public function __construct(Expediente $expediente, Request $request) {
        $this->model = $expediente;
        $this->request = $request;
        $this->page = "expedientes";
        $this->titulo = "GERENCIAMENTO DOS FUNCIONÁRIOS";
        $this->gate = 'SECRETARIA';
    }

}
