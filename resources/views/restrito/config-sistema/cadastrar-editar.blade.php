@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">
        @if(isset($data->CONFIG_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->CONFIG_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif
        <div class='row'>
            <div class='input-field col-md-4'>
                <label>NOME DO SITE</label>
                {!! Form::text('CONFIG_NOMESITE', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_NOMESITE'))
                <span class='text-danger'> {{ $errors->first('CONFIG_NOMESITE') }} </span>
                @endif
            </div>
            <div class='input-field col-md-8'>
                <label>CONFIG_METATITLE</label>
                {!! Form::text('CONFIG_METATITLE', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_METATITLE'))
                <span class='text-danger'> {{ $errors->first('CONFIG_METATITLE') }} </span>
                @endif
            </div>
        </div>
        <div class='row m-t-20'>
            <div class='input-field col-md-4'>
                <label>CONFIG_METADESCRIPTION</label>
                {!! Form::text('CONFIG_METADESCRIPTION', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_METADESCRIPTION'))
                <span class='text-danger'> {{ $errors->first('CONFIG_METADESCRIPTION') }} </span>
                @endif                </div>
            <div class='input-field col-md-4'>
                <label>CONFIG_METAKEYWORDS</label>
                {!! Form::text('CONFIG_METAKEYWORDS', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_METAKEYWORDS'))
                <span class='text-danger'> {{ $errors->first('CONFIG_METAKEYWORDS') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>CONFIG_URLTERMODEUSO</label>
                {!! Form::text('CONFIG_URLTERMODEUSO', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_URLTERMODEUSO'))
                <span class='text-danger'> {{ $errors->first('CONFIG_URLTERMODEUSO') }} </span>
                @endif
            </div>
        </div>
        <div class='row m-t-20'>
            <div class='input-field col-md-4'>
                <label>LOGO TOPO</label>
                {!! Form::file('CONFIG_LOGOTOPO', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_LOGOTOPO'))
                <span class='text-danger'> {{ $errors->first('CONFIG_LOGOTOPO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>LOGO RODAPÉ</label>
                {!! Form::file('CONFIG_LOGORODAPE', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_LOGORODAPE'))
                <span class='text-danger'> {{ $errors->first('CONFIG_LOGORODAPE') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>FAVICON</label>
                {!! Form::file('CONFIG_FAVICON', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_FAVICON'))
                <span class='text-danger'> {{ $errors->first('CONFIG_FAVICON') }} </span>
                @endif
            </div>



        </div>
        <div class='row m-t-20'>
            <div class='input-field col-md-12'>
                <label>CÓDIGO GOOGLE</label>
                {!! Form::textarea('CONFIG_CODGOOGLE', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_CODGOOGLE'))
                <span class='text-danger'> {{ $errors->first('CONFIG_CODGOOGLE') }} </span>
                @endif
            </div>
        </div>
        <div class='row m-t-20'>
            <div class='input-field col-md-6'>
                <label>CHAVE FORNECIDA PELA BEMFUNCIONAL</label>
                {!! Form::text('CONFIG_API', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_API'))
                <span class='text-danger'> {{ $errors->first('CONFIG_API') }} </span>
                @endif
            </div>
            <div class='input-field col-md-6'>
                <label>SENHA FORNECIDA PELA BEMFUNCIONAL</label>
                {!! Form::text('CONFIG_SENHA', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
                @if ($errors->has('CONFIG_SENHA'))
                <span class='text-danger'> {{ $errors->first('CONFIG_SENHA') }} </span>
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