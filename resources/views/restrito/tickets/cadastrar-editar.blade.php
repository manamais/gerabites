@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/despesas')}}'>despesas</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->TICK_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->TICK_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='input-field col-md-3'>
                <label>DEPARTAMENTO</label>
                {{ Form::select('TICK_DEPARTAMENTO', [
                                'Suporte' => 'Suporte Técnico',
                                'Financeiro' => 'Financeiro',
                                'Vendas' => 'Vendas',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('TICK_DEPARTAMENTO'))
                <span class='text-danger'> {{ $errors->first('TICK_DEPARTAMENTO') }} </span>
                @endif
            </div>

            <div class='input-field col-md-2'>
                <label>PRIORIDADE</label>
                {{ Form::select('TICK_PRIORIDADE', [
                                'Baixa' => 'Baixa',
                                'Média' => 'Média',
                                'Alta' => 'Alta',
                                'Urgente' => 'Urgente',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('TICK_PRIORIDADE'))
                <span class='text-danger'> {{ $errors->first('TICK_PRIORIDADE') }} </span>
                @endif
            </div>
            <div class='input-field col-md-7'>
                <label>ASSUNTO</label>
                {!! Form::text('TICK_ASSUNTO', null, ['maxlength' => '60', 'required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('TICK_ASSUNTO'))
                <span class='text-danger'> {{ $errors->first('TICK_ASSUNTO') }} </span>
                @endif

            </div>
        </div>


        @can('COMPANY')
        <div class='row m-t-20'>
            <div class='input-field col-md-9'>
                <label>RELATAR A:</label>
                <select name='user_id_funcionario' class='form-control' autocomplete='yes' >
                    @foreach($users as $user)
                    <option @if(isset($data->user_id_funcionario) && ($data->user_id_funcionario==$user->id)) @php echo 'selected'; @endphp @endif value="{{$user->id}}" >{{$user->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id_funcionario'))
                <span class='text-danger'> {{ $errors->first('user_id_funcionario') }} </span>
                @endif
            </div>

            <div class='input-field col-md-3'>
                <label>STATUS</label>
                {{ Form::select('TICK_STATUS', [
                                'Aberto' => 'Aberto',
                                'Em Análise' => 'Em Análise',
                                'Em Produção' => 'Em Produção',
                                'Resolvido' => 'Resolvido',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('TICK_STATUS'))
                <span class='text-danger'> {{ $errors->first('TICK_STATUS') }} </span>
                @endif
            </div>
        </div>
        @endcan




        <div class='row'>
            <hr/>
            <button type='reset' class='btn btn-default waves-effect'>Resetar</button>
            <button type='submit' class='btn btn-primary waves-effect waves-light'>Salvar Dados</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>


@push('css')
@endpush

@push('js-topo')
@endpush

@push('js-footer')
@endpush

@endsection