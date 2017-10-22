@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/usuarios')}}'>Usuários</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->PROD_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->PROD_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            
            <div class='input-field col-md-3'>
                <label>NOME</label>
                {!! Form::text('PROD_NOME', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '90', 'class' => 'form-control']) !!}
                @if ($errors->has('PROD_NOME'))
                <span class='text-danger'> {{ $errors->first('PROD_NOME') }} </span>
                @endif
            </div>
            <div class='input-field col-md-5'>
                <label>DESCRIÇÃO</label>
                {!! Form::text('PROD_DESCRICAO', null, ['maxlength' => '255', 'class' => 'form-control']) !!}
                @if ($errors->has('PROD_DESCRICAO'))
                <span class='text-danger'> {{ $errors->first('PROD_DESCRICAO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>VALOR R$</label>
                {!! Form::number('PROD_VALOR', null, ['class' => 'form-control']) !!}
                @if ($errors->has('PROD_VALOR'))
                <span class='text-danger'> {{ $errors->first('PROD_VALOR') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label>TIPO</label>
                {{ Form::select('PROD_TIPO', [
                                'PRODUTO' => 'PRODUTO',
                                'HORA' => 'HORA',
                                'MENSALIDADE' => 'MENSALIDADE',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('PROD_TIPO'))
                <span class='color-danger'> {{ $errors->first('PROD_TIPO') }} </span>
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