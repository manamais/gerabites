<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Etapas;

class ProjetosEtapasController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.projetos-etapas';
    protected $redirectIndex = '/restrito/projetos/etapas';

    public function __construct(Etapas $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "projetos/etapas";
        $this->titulo = "CONFIGURAÇÕES DAS ETAPAS DO PROJETOS";
        $this->gate = 'SECRETARIA';
    }


}
