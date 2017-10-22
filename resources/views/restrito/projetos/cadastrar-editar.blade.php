@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/projetos')}}'>projetos</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->PROJ_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->PROJ_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='input-field col-md-5'>
                <label>NOME DO PROJETO</label>
                {!! Form::text('PROJ_NOME', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('PROJ_NOME'))
                <span class='text-danger'> {{ $errors->first('PROJ_NOME') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>EMPRESA</label>
                <select name='EMPR_CODIGO' class="form-control" required>
                    @foreach($empresas as $empresa)
                    <option
                        @if(isset($data->EMPR_CODIGO) && ($data->EMPR_CODIGO==$empresa->EMPR_CODIGO)) @php echo 'selected'; @endphp @endif
                        value="{{$empresa->EMPR_CODIGO}}" >
                        {{$empresa->EMPR_NOMEFANTASIA}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('EMPR_CODIGO'))
                <span class='text-danger'> {{ $errors->first('EMPR_CODIGO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-3'>
                <label>TIPO</label>
                {{ Form::select('PROJ_TIPO', [
                                'tipo1' => 'tipo1',
                                'tipo2' => 'tipo2',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('PROJ_TIPO'))
                <span class='text-danger'> {{ $errors->first('PROJ_TIPO') }} </span>
                @endif
            </div>
        </div>
        <div class='row m-t-20'>
            <div class='input-field col-md-9'>
                <label>DESCRIÇÃO</label>
                {!! Form::text('PROJ_DESCRICAO', null, ['required' => 'yes', 'min' => '2', 'maxlength' => '80', 'class' => 'form-control']) !!}
                @if ($errors->has('PROJ_DESCRICAO'))
                <span class='text-danger'> {{ $errors->first('PROJ_DESCRICAO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-3'>
                <label>TIPO</label>
                {{ Form::select('PROJ_STATUS', [
                                'STANDBY' => 'STANDBY',
                                'EM-EXECUCAO' => 'EM EXECUÇÃO',
                                'CANCELADO' => 'CANCELADO',
                                'FINALIZADO' => 'FINALIZADO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('PROJ_STATUS'))
                <span class='text-danger'> {{ $errors->first('PROJ_STATUS') }} </span>
                @endif
            </div>
        </div>
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