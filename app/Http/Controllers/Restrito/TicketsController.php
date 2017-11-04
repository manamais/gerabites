<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\Tickets;
use App\Models\Restrito\TicketsMensagens;
use Gate;
use Auth;

class TicketsController extends StandardController {

    protected $model;
    protected $mensagens;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.tickets';
    protected $redirectIndex = '/restrito/tickets';

    public function __construct(Tickets $model, TicketsMensagens $mensagens, Request $request) {
        $this->model = $model;
        $this->mensagens = $mensagens;
        $this->request = $request;
        $this->page = "tickets";
        $this->titulo = "TICKETS";
        $this->gate = 'CHAMADOS';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        if (Auth::user()->tipo == 'CLI') {
            $data = $this->model
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->get();
            $ultimoTicket = $this->mensagens
                    ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                    ->leftJoin('users', 'id', 'user_id')
                    ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('COD', 'desc')
                    ->limit(1)
                    ->get();
            $codigo = $this->model
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->limit(1)
                    ->first();

            return view("{$this->nomeView}.index-client", compact('data', 'ultimoTicket'))
                            ->with('codigo', $codigo->TICK_CODIGO)
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            $data = $this->model
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->get();
            $ultimoTicket = $this->mensagens
                    ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                    ->leftJoin('users', 'id', 'user_id')
                    ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                    ->orderBy('COD', 'desc')
                    ->limit(1)
                    ->get();
            $codigo = $this->model
                    ->orderBy('TICK_CODIGO', 'desc')
                    ->limit(1)
                    ->first();

            return view("{$this->nomeView}.index-company", compact('data', 'ultimoTicket'))
                            ->with('codigo', $codigo->TICK_CODIGO)
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
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
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $rules = $this->model->rules;
        $rulesTratada = str_replace("((ID{?}))", $id, $rules);
        $dadosForm = $this->request->all();
        $idCliente = array('user_id' => Auth::user()->id);
        $dadosForm = array_merge($dadosForm, $idCliente);
        $status = array('TICK_STATUS' => 'Aberto');
        $dadosForm = array_merge($dadosForm, $status);



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
            $data = $this->model->orderBy('TICK_CODIGO','desc')
                    ->where('user_id',Auth::user()->id)
                    ->get();
            $ticket = $this->model->where([['TICK_CODIGO', $id],
                        ['user_id', Auth::user()->id]])->first();
            $mensagens = $this->mensagens
                            ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                            ->leftJoin('users', 'id', 'user_id')
                            ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                            ->where('mensagens_tickets.TICK_CODIGO', $id)->get();
        } else {
            $data = $this->model->orderBy('TICK_CODIGO','desc')->get();
            $mensagens = $this->mensagens
                            ->leftJoin('tickets', 'mensagens_tickets.TICK_CODIGO', 'tickets.TICK_CODIGO')
                            ->leftJoin('users', 'id', 'user_id')
                            ->select('users.*', 'tickets.*', 'mensagens_tickets.*', 'tickets.created_at as criadoem', 'tickets.TICK_CODIGO as COD')
                            ->where('mensagens_tickets.TICK_CODIGO', $id)->get();
            dd($mensagens);
            
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
