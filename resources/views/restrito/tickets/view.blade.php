@extends('layouts.restrito')
@section('content')

<ol class='breadcrumb breadcrumb-arrow text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/categorias')}}'>Classificação</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class='section-title first-title'>
    {{$titulo}}
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right white'>Abrir chamado</a>
</h3>

<div class='row'>
    <div class='col-sm-4'>
        <div class='content-box'>
            <div class='content'>
                <strong>Atividades Recentes</strong>
                @foreach($data as $registro)
                <a href='{{url("/restrito/tickets/$registro->TICK_CODIGO/view")}}'>
                    <div class='p-t-10' style='border-bottom: 1px solid #bbb;'>
                        @if($registro->TICK_STATUS=='Aberto')
                        @php $cor='btn-danger' @endphp

                        @elseif($registro->TICK_STATUS=='Fechado')
                        @php $cor='btn-primary' @endphp

                        @elseif($registro->TICK_STATUS=='Resolvido')
                        @php $cor='btn-success' @endphp

                        @else
                        @php $cor='btn-warning' @endphp
                        @endif
                        <table width='100%'>
                            <tr>
                                <td>
                                    TIKET-{{$registro->TICK_CODIGO}}
                                    <p class='f-10'>Responsável Atendimento</p>
                                </td>
                                <td class='pull-right text-right'>
                                    <button class='btn {{$cor}} btn-xs'>
                                        {{$registro->TICK_STATUS}}
                                    </button>
                                    <p class='f-10'>08:00</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>

    <div class='col-sm-8'>
        <div class='content-box'>
            <div class='content'>
                <div class='clients-list'>
                    <div class='btn-group info'>
                        <button type='button' class='btn btn-info btn-sm'>Alterar Status</button>
                        <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                            <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu pull-left'>
                            <li><a href='#'>Aberto</a></li>
                            <li><a href='#'>Fechar</a></li>
                            <li><a href='#'>Resolvido</a></li>
                            <li><a href='#'>Pendente</a></li>
                        </ul>
                    </div>



                    @foreach($mensagens as $mensagem)
                    
                    <table width='100%' class='m-t-30' >
                        <tr>
                            @if($mensagem->foto != '')
                            <td width='50px' style='vertical-align: top;'>
                                <a class='pull-left thumb-sm avatar'>
                                    <img src='{{url("assets/img/users/$mensagem->foto")}}' class='img-circle img-responsive'/>
                                </a>
                            </td>
                            <td width='5px' class='text-right' style='vertical-align: top;'>
                                <p class='f-s-28 text-info'>
                                    <i class='zmdi zmdi-caret-left'></i>
                                </p>

                            </td>
                            @endif
                            <td style='vertical-align: top;'>
                                <div class='border-radius p-10' style='border: 1px solid #49ceff;'>
                                    <p class='text-info'>
                                        <strong>
                                            {{$mensagem->name}} - 
                                        </strong>
                                        @if($mensagem->tipo == 'CLI')
                                        <span class='label label-default f-s-10'>
                                            Cliente
                                        </span>
                                        @else
                                        <span class='label label-danger f-s-10'>
                                            {{$mensagem->cargo}}
                                        </span>
                                        @endif
                                        <br/>
                                        <span style='color: #454545'>
                                            <i class='zmdi zmdi-time'></i>
                                            {{ \Carbon\Carbon::parse($mensagem->criadoem)->format('d/m/Y G:i')}}
                                        </span>


                                    </p>
                                    <br/>
                                    {{$mensagem->TICK_MENSAGEM}}
                                </div>
                            </td>
                        </tr>
                    </table>
                    @endforeach


                    
                    

                    {!! Form::open(['url' => "/restrito/$page/$ticket/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
                    'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
                    <div class='row m-t-20'>
                        <div class='input-field col-md-12'>
                            <label>MENSAGEM
                            </label>
                                <button type='submit' class='btn btn-primary waves-effect waves-light pull-right'>Enviar</button>
                            {!! Form::textarea('TICK_MENSAGEM', null, ['class' => 'form-control', 'rows'=>'5']) !!}
                            @if ($errors->has('TICK_MENSAGEM'))
                            <span class='text-danger'> {{ $errors->first('TICK_MENSAGEM') }} </span>
                            @endif
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
@endpush

@push('js-topo')
@endpush

@push('js-footer')
@endpush

@endsection