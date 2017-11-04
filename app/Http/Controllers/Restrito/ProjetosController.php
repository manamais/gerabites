<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Projetos;
use App\Models\Restrito\Empresa;
use App\Models\Restrito\Tarefas;
use App\Models\Restrito\Comentarios;
use App\Models\Restrito\Arquivos;
use App\Models\Restrito\Bugs;
use App\Models\Restrito\Produtos;
use App\Models\Restrito\Etapas;
use App\User;
use Gate;
use Auth;

class ProjetosController extends StandardController {

    protected $model;
    protected $empresas;
    protected $comentarios;
    protected $tarefas;
    protected $arquivos;
    protected $bugs;
    protected $users;
    protected $produtos;
    protected $etapas;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.projetos';
    protected $redirectIndex = '/restrito/projetos';

    public function __construct(Projetos $model, Etapas $etapas, Empresa $empresas, Produtos $produtos, Comentarios $comentarios, User $users, Tarefas $tarefas, Arquivos $arquivos, Bugs $bugs, Request $request) {
        $this->model = $model;
        $this->empresas = $empresas;
        $this->comentarios = $comentarios;
        $this->tarefas = $tarefas;
        $this->arquivos = $arquivos;
        $this->bugs = $bugs;
        $this->users = $users;
        $this->produtos = $produtos;
        $this->etapas = $etapas;
        $this->request = $request;
        $this->page = "projetos";
        $this->titulo = "CONFIGURAÇÕES DOS PROJETOS";
        $this->gate = 'TAREFAS';
        $this->gateUser = 'MEUS-PROJETOS'; /* PARA CLIENTES */
    }

    public function index() {
        if (Auth::user()->tipo == 'CLI') {
            $gate = $this->gateUser;
            if (Gate::denies("$gate")) {
                abort(403, 'Não Autorizado!');
            }
            $data = $this->model
                    ->leftJoin('empresas', 'empresas.EMPR_CODIGO', 'projetos.EMPR_CODIGO')
                    ->where('empresas.EMPR_CODIGO', Auth::user()->EMPR_CODIGO)
                    ->get();
        } else {
            $gate = $this->gate;
            if (Gate::denies("$gate")) {
                abort(403, 'Não Autorizado!');
            }
            $data = $this->model
                    ->leftJoin('empresas', 'empresas.EMPR_CODIGO', 'projetos.EMPR_CODIGO')
                    ->get();
        }





        return view("{$this->nomeView}.index", compact('data'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrar() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $empresas = $this->empresas->where('EMPR_CODIGO', '<>', 1)->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('empresas'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->model->find($id);
        $empresas = $this->empresas->where('EMPR_CODIGO', '<>', 1)->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('data', 'empresas'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function view($id) {
        $projetos = $this->model->find($id);
        $nomeProjeto = $projetos->PROJ_NOME;

        $data = $this->model->find($id);
        $tarefas = $this->tarefas
                        ->leftJoin('produtos', 'produtos.PROD_CODIGO', 'tarefas.PROD_CODIGO')
                        ->leftJoin('users', 'users.id', 'user_id')
                        ->where('PROJ_CODIGO', $projetos->PROJ_CODIGO)->get();

        $etapas = $this->etapas
                ->leftJoin('tarefas', 'tarefas.ETA_CODIGO', 'etapas.ETA_CODIGO')
                ->select('etapas.ETA_CODIGO', 'etapas.ETA_NOME', 'PROJ_CODIGO')
                ->where([['PROJ_CODIGO', $id], ['tarefas.deleted_at', NULL]])
                ->distinct('etapas.ETA_CODIGO')
                ->get();

        $comentarios = $this->comentarios
                        ->leftJoin('users', 'id', 'user_id')
                        ->select('users.*', 'comentarios.COM_TEXTO', 'comentarios.COM_VISIVELAOCLIENTE', 'comentarios.user_id', 'comentarios.created_at as criadoem')
                        ->where('PROJ_CODIGO', $projetos->PROJ_CODIGO)->get();
//dd($comentarios);
        $arquivos = $this->arquivos->where('PROJ_CODIGO', $projetos->PROJ_CODIGO)->get();
        $bugs = $this->bugs->where('PROJ_CODIGO', $projetos->PROJ_CODIGO)->get();

        return view("{$this->nomeView}.view", compact('data', 'tarefas', 'comentarios', 'arquivos', 'bugs', 'etapas'))
                        ->with('codProjeto', $id)
                        ->with('nomeProjeto', $nomeProjeto)
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarTarefa($cod) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $users = $this->users->where('tipo', '<>', 'CLI')->get();
        $produtos = $this->produtos->all();
        $etapas = $this->etapas->all();
        return view("{$this->nomeView}.cadastrar-editar-tarefas", compact('users', 'produtos', 'etapas'))
                        ->with('page', "projetos/$cod/tarefas")
                        ->with('codProjeto', $cod)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarTarefaDB($cod) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();

        if (isset($dadosForm['TAR_DTFINAL']) && $dadosForm['TAR_DTFINAL'] == '') {
            unset($dadosForm['TAR_DTFINAL']);
        }

        $codProjeto = array('PROJ_CODIGO' => $cod);
        $dadosForm = array_merge($dadosForm, $codProjeto);

        $validator = validator($dadosForm, $this->tarefas->rules);

        if ($validator->fails()) {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $insert = $this->tarefas->create($dadosForm);
        }

        if ($insert) {
            alert()->success('', 'Registro inserido!');
            return redirect("/restrito/projetos/view/$cod")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function editarTarefa($cod, $id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->tarefas->find($id);
        $users = $this->users->where('tipo', '<>', 'CLI')->get();
        $produtos = $this->produtos->all();
        $etapas = $this->etapas->all();

        if ($data != '') {
            $codProjeto = $data->PROJ_CODIGO;
            return view("{$this->nomeView}.cadastrar-editar-tarefas", compact('data', 'users', 'produtos', 'etapas'))
                            ->with('codProjeto', $codProjeto)
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            abort(404, 'Não Autorizado!');
        }
    }

    public function editarTarefaDB($cod, $id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->tarefas->find($id);

        $rules = $this->tarefas->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();
        if (isset($dadosForm['TAR_DTINICIO']) && $dadosForm['TAR_DTINICIO'] == '') {
            $dadosForm['TAR_DTINICIO'] = $data->TAR_DTINICIO;
        }
        if (isset($dadosForm['TAR_DTPRAZOESTIMADO']) && $dadosForm['TAR_DTPRAZOESTIMADO'] == '') {
            $dadosForm['TAR_DTPRAZOESTIMADO'] = $data->TAR_DTPRAZOESTIMADO;
        }
        if (isset($dadosForm['TAR_DTFINAL']) && $dadosForm['TAR_DTFINAL'] == '') {
            unset($dadosForm['TAR_DTFINAL']);
        }
        $codProjeto = array('PROJ_CODIGO' => $cod);
        $dadosForm = array_merge($dadosForm, $codProjeto);

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
            $item = $this->tarefas->find($id);
            $update = $item->update($dadosForm);
        }

        if ($update) {
            $cod = $item->PROJ_CODIGO;
            alert()->success('', 'Registro alterado!');
            return redirect("/restrito/projetos/view/$cod")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function deletarTarefa($cod, $id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $item = $this->tarefas->find($id);
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

    public function cadastrarComentarios($cod) {
        $gate = 'COMENTARIO';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        //$users = $this->users->where('tipo', '<>', 'CLI')->get();
        $produtos = $this->produtos->all();
        $etapas = $this->etapas->all();
        return view("{$this->nomeView}.cadastrar-editar-comentarios", compact('users', 'produtos', 'etapas'))
                        ->with('page', "projetos/$cod/tarefas")
                        ->with('codProjeto', $cod)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarComentariosDB($cod) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();


        if (isset($dadosForm['TAR_DTFINAL']) && $dadosForm['TAR_DTFINAL'] == '') {
            unset($dadosForm['TAR_DTFINAL']);
        }

        $user_id = array('user_id' => Auth::user()->id);
        $dadosForm = array_merge($dadosForm, $user_id);
        $codProjeto = array('PROJ_CODIGO' => $cod);
        $dadosForm = array_merge($dadosForm, $codProjeto);



        $validator = validator($dadosForm, $this->comentarios->rules);

        if ($validator->fails()) {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $insert = $this->comentarios->create($dadosForm);
        }

        if ($insert) {
            alert()->success('', 'Registro inserido!');
            return redirect("/restrito/projetos/view/$cod")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function editarComentarios($cod, $id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->comentarios->find($id);
        $users = $this->users->where('tipo', '<>', 'CLI')->get();
        $produtos = $this->produtos->all();
        $etapas = $this->etapas->all();

        if ($data != '') {
            $codProjeto = $data->PROJ_CODIGO;
            return view("{$this->nomeView}.cadastrar-editar-comentarios", compact('data', 'users', 'produtos', 'etapas'))
                            ->with('codProjeto', $codProjeto)
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            abort(404, 'Não Autorizado!');
        }
    }

    public function editarComentariosDB($cod, $id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $data = $this->comentarios->find($id);

        $rules = $this->comentarios->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();
        if (isset($dadosForm['TAR_DTINICIO']) && $dadosForm['TAR_DTINICIO'] == '') {
            $dadosForm['TAR_DTINICIO'] = $data->TAR_DTINICIO;
        }
        if (isset($dadosForm['TAR_DTPRAZOESTIMADO']) && $dadosForm['TAR_DTPRAZOESTIMADO'] == '') {
            $dadosForm['TAR_DTPRAZOESTIMADO'] = $data->TAR_DTPRAZOESTIMADO;
        }
        if (isset($dadosForm['TAR_DTFINAL']) && $dadosForm['TAR_DTFINAL'] == '') {
            unset($dadosForm['TAR_DTFINAL']);
        }
        $codProjeto = array('PROJ_CODIGO' => $cod);
        $dadosForm = array_merge($dadosForm, $codProjeto);

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
            $item = $this->comentarios->find($id);
            $update = $item->update($dadosForm);
        }

        if ($update) {
            $cod = $item->PROJ_CODIGO;
            alert()->success('', 'Registro alterado!');
            return redirect("/restrito/projetos/view/$cod")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function deletarComentarios($cod, $id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $item = $this->comentarios->find($id);
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

    public function cadastrarBugs($cod) {
        $gate = 'BUGS';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $users = $this->users->where('tipo', '<>', 'CLI')->get();
        return view("{$this->nomeView}.cadastrar-editar-bugs", compact('users'))
                        ->with('page', "projetos/$cod/tarefas")
                        ->with('codProjeto', $cod)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarBugsDB($cod) {
        $gate = 'BUGS';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $codProjeto = array('PROJ_CODIGO' => $cod);
        $dadosForm = array_merge($dadosForm, $codProjeto);

        if (Auth::user()->tipo == 'CLI') {
            $status = array('BUGS_STATUS' => 'Aberto');
            $dadosForm = array_merge($dadosForm, $status);
        }


        $validator = validator($dadosForm, $this->bugs->rules);


        if ($validator->fails()) {
            $messages = $validator->messages();
            return $messages;
        }


        if ($validator->fails()) {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $insert = $this->bugs->create($dadosForm);
        }

        if ($insert) {
            alert()->success('', 'Registro inserido!');
            return redirect("/restrito/projetos/view/$cod")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function editarBugs($cod, $id) {
        $gate = 'BUGS-STATUS';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $users = $this->users->where('tipo', '<>', 'CLI')->get();
        $data = $this->bugs->find($id);



        if ($data != '') {
            $codProjeto = $data->PROJ_CODIGO;
            return view("{$this->nomeView}.cadastrar-editar-bugs", compact('data', 'users'))
                            ->with('page', "projetos/$cod/bugs")
                            ->with('codProjeto', $cod)
                            ->with('titulo', $this->titulo);
        } else {
            abort(404, 'Não Autorizado!');
        }
    }

    public function editarBugsDB($cod, $id) {
        $gate = 'BUGS-STATUS';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $codProjeto = array('PROJ_CODIGO' => $cod);
        $dadosForm = array_merge($dadosForm, $codProjeto);
        $data = $this->bugs->find($id);

        $rules = $this->bugs->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);

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
            $item = $this->bugs->find($id);
            $update = $item->update($dadosForm);
        }

        if ($update) {
            $cod = $item->PROJ_CODIGO;
            alert()->success('', 'Registro alterado!');
            return redirect("/restrito/projetos/view/$cod")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function deletarBugs($cod, $id) {
        $gate = 'BUGS-STATUS';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $item = $this->bugs->find($id);
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
