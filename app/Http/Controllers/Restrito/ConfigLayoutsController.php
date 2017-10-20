<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Layouts;
use Gate;

class ConfigLayoutsController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-layouts-site';
    protected $redirectIndex = '/restrito/layouts';

    public function __construct(Layouts $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "layouts";
        $this->titulo = "ESCOLHER LAYOUT DO SITE";
        $this->gate = 'SECRETARIA';
    }

    public function ativar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $desativar = $this->model
                ->where('LAY_CODIGO', '<>', $id)
                ->update(['LAY_STATUS' => 'INATIVO']);
        $ativar = $this->model
                ->where('LAY_CODIGO', $id)
                ->update(['LAY_STATUS' => 'ATIVO']);

        if ($desativar && $ativar ) {
            alert()->success('', 'Template alterado!');
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

}
