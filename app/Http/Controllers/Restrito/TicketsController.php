<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Tickets;
use App\Models\Restrito\TicketsMensagens;
use App\User;
use Gate;
use Auth;

class TicketsController extends StandardController {

    protected $model;
    protected $users;
    protected $mensagens;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.tickets';
    protected $redirectIndex = '/restrito/tickets';

    public function __construct(Tickets $model, TicketsMensagens $mensagens, User $users, Request $request) {
        $this->model = $model;
        $this->users = $users;
        $this->mensagens = $mensagens;
        $this->request = $request;
        $this->page = "tickets";
        $this->titulo = "TICKETS";
        $this->gate = 'CHAMADOS';
    }

    public function index() {
        if (Auth::user()->tipo == 'CLI') {
            $gate = $this->gate;
            if (Gate::denies("$gate")) {
                abort(403, 'Não Autorizado!');
            }
            $data = $this->model
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->get();

            $ultimoTicket = $this->mensagens
                    ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                    ->leftJoin('users', 'id', 'mensagens_tickets.user_id')
                    ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                    ->where('mensagens_tickets.user_id', Auth::user()->id)
                    ->orderBy('COD', 'desc')
                    ->limit(1)
                    ->get();
            $codigo = $this->model
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->limit(1)
                    ->first();

            /* VERIFICAÇÃO SE EXISTE ALGUM TICKET */
            if ($codigo != null) {
                return view("{$this->nomeView}.index-client", compact('data', 'ultimoTicket'))
                                ->with('codigo', $codigo->TICK_CODIGO)
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            } else {
                return view("{$this->nomeView}.index-client", compact('data', 'ultimoTicket'))
                                ->with('codigo', 0)
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
            /* VERIFICAÇÃO SE EXISTE ALGUM TICKET */
        } else {
            $gate = 'RESPONDER-CHAMADOS';
            if (Gate::denies("$gate")) {
                abort(403, 'Não Autorizado!');
            }
            $users = $this->users->where('tipo','<>','CLI')->get();
            $data = $this->model
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->get();

            $ultimoTicket = $this->mensagens
                    ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                    ->leftJoin('users', 'id', 'mensagens_tickets.user_id')
                    ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                    ->orderBy('COD', 'desc')
                    ->limit(1)
                    ->get();
            $codigo = $this->model
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->limit(1)
                    ->first();

            /* VERIFICAÇÃO SE EXISTE ALGUM TICKET */
            if ($codigo != null) {
                return view("{$this->nomeView}.index-company", compact('data', 'ultimoTicket', 'users'))
                                ->with('codigo', $codigo->TICK_CODIGO)
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            } else {
                return view("{$this->nomeView}.index-company", compact('data', 'ultimoTicket', 'users'))
                                ->with('codigo', 0)
                                ->with('page', $this->page)
                                ->with('titulo', $this->titulo);
            }
            /* VERIFICAÇÃO SE EXISTE ALGUM TICKET */
        }
    }

    public function cadastrar() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        return view("{$this->nomeView}.cadastrar-editar")
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function editar($id) {
        $gate = 'RESPONDER-CHAMADOS';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $users = $this->users->where('tipo', '<>', 'CLI')->get();
        $data = $this->model->find($id);
        return view("{$this->nomeView}.cadastrar-editar", compact('data','users'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarDB() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $idCliente = array('user_id' => Auth::user()->id);
        $dadosForm = array_merge($dadosForm, $idCliente);
        $status = array('TICK_STATUS' => 'Aberto');
        $dadosForm = array_merge($dadosForm, $status);

        $validator = validator($dadosForm, $this->model->rules);

        /*
        if ($validator->fails()) {
            $messages = $validator->messages();
            return $messages;
        }
         * 
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
            $id = $insert->TICK_CODIGO;
            alert()->success('', 'Registro inserido!');
            return redirect("/restrito/tickets/$id/view")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function editarDB($id) {
        $gate = 'RESPONDER-CHAMADOS';
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        
        $item = $this->model->find($id);
        dd($item->user_id);

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();
        $idCliente = array('user_id' => Auth::user()->id);
        $dadosForm = array_merge($dadosForm, $idCliente);
        $status = array('TICK_STATUS' => 'Aberto');
        $dadosForm = array_merge($dadosForm, $status);
        
        
        
        
        if (Auth::user()->tipo == 'CLI') {
            $status = array('BUGS_STATUS' => 'Aberto');
            $dadosForm = array_merge($dadosForm, $status);
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

    /* redirecionamento depois do cadastro do ticket 
     * ou abertura ao selecionar um ticket específico */

    public function view($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        /*
         * O cliente só pode visualizar os ticket da sua conta
         */
        if (Auth::user()->tipo == 'CLI') {
            $data = $this->model->orderBy('TICK_CODIGO', 'desc')
                    ->where('user_id', Auth::user()->id)
                    ->get();
            $ticket = $this->model->where([['TICK_CODIGO', $id],
                        ['user_id', Auth::user()->id]])->first();
            $mensagens = $this->mensagens
                            ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                            ->leftJoin('users', 'id', 'mensagens_tickets.user_id')
                            ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                            ->where('mensagens_tickets.TICK_CODIGO', $id)->get();
        } else {
            $data = $this->model->orderBy('TICK_CODIGO', 'desc')->get();
            $mensagens = $this->mensagens
                            ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                            ->leftJoin('users', 'id', 'mensagens_tickets.user_id')
                            ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                            ->where('mensagens_tickets.TICK_CODIGO', $id)->get();
        }





        return view("restrito.tickets.view", compact('data', 'mensagens'))
                        ->with('ticket', $id)
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function cadastrarMsgDB($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $ticket = array('TICK_CODIGO' => $id);
        $dadosForm = array_merge($dadosForm, $ticket);
//        $cliente = array('user_id' => Auth::user()->id);
//        $dadosForm = array_merge($dadosForm, $cliente);







        $validator = validator($dadosForm, $this->mensagens->rules);

        /*
          if ($validator->fails()) {
          $messages = $validator->messages();
          return $messages;
          }
         * 
         */

        if ($validator->fails()) {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $insert = $this->mensagens->create($dadosForm);
        }

        if ($insert) {
            $id = $insert->TICK_CODIGO;
            alert()->success('', 'Registro inserido!');
            return redirect("/restrito/tickets/$id/view")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

}
