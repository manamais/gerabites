<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\DebitosTipo;
use Gate;

class FinanceiroDespesasCategoriasController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.financeiro-depesas-categorias';
    protected $redirectIndex = '/restrito/despesas/categorias';

    public function __construct(DebitosTipo $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "despesas/categorias";
        $this->titulo = "GERENCIAMENTO DAS CATEGORIAS DAS DESPESAS";
        $this->gate = 'SECRETARIA';
    }


}
