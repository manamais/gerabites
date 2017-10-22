<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Produtos;
use Gate;

class ProdutosServicosController extends StandardController {

    protected $model;
     protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.produtos-servicos';
    protected $redirectIndex = '/restrito/produtos-servicos';

    public function __construct(Produtos $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "produtos-servicos";
        $this->titulo = "GERENCIAMENTO DOS PRODUTOS/SERVIÇOS";
        $this->gate = 'SECRETARIA';
    }

}
