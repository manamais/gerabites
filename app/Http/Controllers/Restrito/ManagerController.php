<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class ManagerController extends Controller {

    public function index() {
        $gate = "SECRETARIA";
        if (Gate::denies($gate)) {
            abort(403, 'Não Autorizado!');
        }
        return view("restrito.manager.index")
                        ->with('page', 'manager')
                        ->with('titulo', 'CLASSIFICAÇÕES (CATEGORIAS, POSIÇÕES)');
    }

}
