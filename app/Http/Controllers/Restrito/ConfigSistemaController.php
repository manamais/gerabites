<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\StandardController;
use App\Models\Restrito\ConfigSistema;
use Gate;
use Illuminate\Http\Request;
use Image;
use Illuminate\Validation\Rule;

class ConfigSistemaController extends StandardController {

    protected $model;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-sistema';
    protected $redirectIndex = '/restrito/configuracoes-sistema';

    public function __construct(ConfigSistema $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
        $this->page = "configuracoes-sistema";
        $this->titulo = "CONFIGURAÇÕES DO SISTEMA";
        $this->gate = 'SECRETARIA';
    }

    public function editarDB($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $logoTopo = $this->request->file('CONFIG_LOGOTOPO');
        $logoRodape = $this->request->file('CONFIG_LOGORODAPE');
        $favicon = $this->request->file('CONFIG_FAVICON');

        if (isset($logoTopo) && $logoTopo != null) {
            if ($logoTopo->isValid()) {
                $regras = ['CONFIG_LOGOTOPO' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:300'];
                $logoTopoArray = array('CONFIG_LOGOTOPO' => $logoTopo);
                $validator = validator($logoTopoArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    //dd('nao encontrou falhas');
                    $path = public_path('assets/restrict/images/');
                    $image = Image::make($logoTopo)->encode('png');
                    $image->resize(360, 100);
                    $image->save($path . "logoTopo.png");
                    $imagem = array('CONFIG_LOGOTOPO' => "logoTopo.png");
                    $dadosForm = array_merge($dadosForm, $imagem);
                }
            } else {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        } else {
            $imagem = array('CONFIG_LOGOTOPO' => "logoTopo.png");
            $dadosForm = array_merge($dadosForm, $imagem);
        }


        if (isset($logoRodape) && $logoRodape != null) {
            if ($logoRodape->isValid()) {
                $regras = ['CONFIG_LOGORODAPE' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:300'];
                $logoRodapeArray = array('CONFIG_LOGORODAPE' => $logoRodape);
                $validator = validator($logoRodapeArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    //dd('nao encontrou falhas');
                    $path = public_path('assets/restrict/images/');
                    $image = Image::make($logoRodape)->encode('png');
                    $image->resize(360, 100);
                    $image->save($path . "logoRodape.png");
                    $imagem = array('CONFIG_LOGORODAPE' => "logoRodape.png");
                    $dadosForm = array_merge($dadosForm, $imagem);
                }
            } else {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        } else {
            $imagem = array('CONFIG_LOGORODAPE' => "logoRodape.png");
            $dadosForm = array_merge($dadosForm, $imagem);
        }


        if (isset($favicon) && $favicon != null) {
            if ($favicon->isValid()) {
                $regras = ['CONFIG_FAVICON' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $faviconArray = array('CONFIG_FAVICON' => $favicon);
                $validator = validator($faviconArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    //dd('nao encontrou falhas');
                    $path = public_path('assets/restrict/images/');
                    $image = Image::make($favicon)->encode('png');
                    $image->resize(30, 30);
                    $image->save($path . "favicon.png");
                    $imagem = array('CONFIG_FAVICON' => "favicon.png");
                    $dadosForm = array_merge($dadosForm, $imagem);
                }
            } else {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        } else {
            $imagem = array('CONFIG_FAVICON' => "favicon.png");
            $dadosForm = array_merge($dadosForm, $imagem);
        }

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);

        $validator = validator($dadosForm, $rulesTratada);

        if ($validator->fails()) {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $item = $this->model->find($id);
            $update = $item->update($dadosForm);
        }

        if ($update) {
            alert()->success('', 'Registro alterado!');
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

}
