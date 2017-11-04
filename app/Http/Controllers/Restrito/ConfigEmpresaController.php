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
        $this->gate = 'COMPANY';
    }
    
    
    public function deletar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        if($id==1){
            abort(403, 'Não Autorizado!');
        }
        $item = $this->model->find($id);
        $deleta = $item->delete();

        if ($deleta) {
            return '1';
        } else {
            alert()->error('Pressione F5 e verifique se o arquivo continua na lista. Caso o erro persista, entre em contato com a Administração.', 'Erro na exclusÃ£o!')->autoclose(4500);
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

}
