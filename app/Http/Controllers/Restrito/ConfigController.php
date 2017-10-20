<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class ConfigController extends Controller {

    public function index() {
        $gate = "SECRETARIA";
        if (Gate::denies($gate)) {
            abort(403, 'Não Autorizado!');
        }
        return view("restrito.config.index")
                        ->with('page', 'configuracoes')
                        ->with('titulo', 'CONFIGURAÇÕES DO SISTEMA');
    }

}
