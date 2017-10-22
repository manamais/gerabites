<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Impostos;
use Gate;

class FinanceiroImpostosController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.financeiro-impostos';
    protected $redirectIndex = '/restrito/impostos';

    public function __construct(Impostos $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "impostos";
        $this->titulo = "GERENCIAMENTO DAS TAXAS E IMPOSTOS";
        $this->gate = 'SECRETARIA';
    }


}
