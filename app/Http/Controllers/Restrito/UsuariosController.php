<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\User;
use App\Models\Restrito\Empresa;
use Gate;
use Image;

class UsuariosController extends StandardController {

    protected $model;
    protected $empresas;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.usuarios';
    protected $redirectIndex = '/restrito/usuarios';

    public function __construct(User $model, Empresa $empresas, Request $request) {
        $this->model = $model;
        $this->empresas = $empresas;
        $this->request = $request;
        $this->page = "usuarios";
        $this->titulo = "GERENCIAMENTO DOS USUÁRIOS";
        $this->gate = 'GERENCIAMENTO-USUARIOS';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model
                        ->leftJoin('empresas', 'empresas.EMPR_CODIGO', 'users.EMPR_CODIGO')
                        ->where('id', '>', 1)->get();
        return view("{$this->nomeView}.index", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrar() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $empresas = $this->empresas->all();
        return view("{$this->nomeView}.cadastrar-editar", compact('empresas'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        if (isset($dadosForm['password'])) {
            $pass = array('password' => bcrypt($dadosForm['password']));
        }
        $dadosForm = array_merge($dadosForm, $pass);

        $imagem = $this->request->file('foto');
        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {
                $regras = ['foto' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('foto' => $imagem);
                $validator = validator($imagemArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    //dd('nao encontrou falhas');
                    $idUser = $this->model->orderBy('id','desc')->first();
                    $final = $idUser->id + 1;
                    $nomeArquivo = "USER_" . $final;
                    $path = public_path('assets/img/users/');
                    $image = Image::make($imagem)->fit('300', '300')->encode('jpg');
                    $image->save($path . "$nomeArquivo.jpg");
                    $imagem = array('foto' => "$nomeArquivo.jpg");
                    $dadosForm = array_merge($dadosForm, $imagem);
                }
            } else {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        }


        $validator = validator($dadosForm, $this->model->rules);
        /*
          if( $validator->fails() ) {
          $messages = $validator->messages();
          return $messages;
          }
         */
        if ($validator->fails()) {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $insert = $this->model->create($dadosForm);
        }

        if ($insert) {
            alert()->success('', 'Registro inserido!');
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        if ($id == 1) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->find($id);
        $empresas = $this->empresas->all();
        return view("{$this->nomeView}.cadastrar-editar", compact('data','empresas'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editarDB($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }


        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();

        $passUser = $this->model->where([['id', $id], ['id', '<>', '1']])->first();
        if (isset($dadosForm['password']) && $dadosForm['password'] != '') {
            $pass = array('password' => bcrypt($dadosForm['password']));
        } else {
            $pass = array('password' => $passUser->password);
        }
        $dadosForm = array_merge($dadosForm, $pass);

        $imagem = $this->request->file('foto');
        if (isset($imagem) && $imagem != null) {
            if ($imagem->isValid()) {

                $regras = ['foto' => 'image|mimes:jpg,jpeg,png,bmp,gif|max:1024'];
                $imagemArray = array('foto' => $imagem);
                $validator = validator($imagemArray, $regras);

                if ($validator->fails()) {
                    //dd('tem falha');
                    return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput()
                                    ->with('page', $this->page)
                                    ->with('titulo', $this->titulo);
                } else {
                    //dd('nao encontrou falhas');
                    $nomeArquivo = "USER_" . $id;
                    $path = public_path('assets/img/users/');
                    $image = Image::make($imagem)->fit('300', '300')->encode('jpg');
                    $image->save($path . "$nomeArquivo.jpg");
                    $imagem = array('foto' => "$nomeArquivo.jpg");
                    $dadosForm = array_merge($dadosForm, $imagem);
                    //dd($dadosForm);
                }
            } else {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
        }


        $validator = validator($dadosForm, $rulesTratada);

        /*
          if( $validator->fails() ) {
          $messages = $validator->messages();
          return $messages;
          }
         */
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

    public function deletar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
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
