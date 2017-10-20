<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\StandardControllerPublic;
use App\Models\Restrito\Edicoes;

class VersaoImpressaController extends StandardControllerPublic {

    protected $gate;
    protected $model;

    public function __construct(Edicoes $model) {
        $this->gate = 'IMPRESSO';
        $this->model = $model;
    }

    public function impresso() {
        $edicao = $this->model->orderBy('VI_NUMERO','desc')->limit(1)->first();
        $pdf = $edicao->VI_PDF;
        $edicao = $edicao->VI_NUMERO;
        $edicoes = $this->model->orderBy('VI_NUMERO','desc')->limit(100)->get();
        return view('site.versaoimpressa.index', compact('edicoes'))
                ->with('edicao',$edicao)
                ->with('pdf',$pdf);
        
    }

    public function versaoImpressa($edicao) {
        $edicao = $this->model->where('VI_NUMERO',$edicao)->first();
        $pdf = $edicao->VI_PDF;
        $edicao = $edicao->VI_NUMERO;
        $edicoes = $this->model->orderBy('VI_NUMERO','desc')->limit(100)->get();
        return view('site.versaoimpressa.index', compact('edicoes'))
                ->with('edicao',$edicao)
                ->with('pdf',$pdf);
        
    }

}
