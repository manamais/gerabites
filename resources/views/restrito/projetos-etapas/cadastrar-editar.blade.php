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

        @if(isset($data->ETA_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->ETA_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='input-field col-md-3'>
                <label>ETAPA</label>
                {!! Form::text('ETA_NOME', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('ETA_NOME'))
                <span class='text-danger'> {{ $errors->first('ETA_NOME') }} </span>
                @endif
            </div>
            <div class='input-field col-md-9'>
                <label>DESCRIÇÃO</label>
                {!! Form::text('ETA_DESCRICAO', null, ['required' => 'yes', 'min' => '10', 'maxlength' => '255', 'class' => 'form-control']) !!}
                @if ($errors->has('ETA_DESCRICAO'))
                <span class='text-danger'> {{ $errors->first('ETA_DESCRICAO') }} </span>
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