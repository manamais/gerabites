@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            @if(isset($data->CONFIG_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->CONFIG_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif
            <div class='row'>
                <div class='input-field col-md-4'>
                    <label for='CONFIG_NOMESITE'>NOME DO SITE</label>
                    {!! Form::text('CONFIG_NOMESITE', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-8'>
                    <label for='CONFIG_METATITLE'>CONFIG_METATITLE</label>
                    {!! Form::text('CONFIG_METATITLE', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>
            </div>
            <div class='row manager'>
                <div class='input-field col-md-4'>
                    <label for='CONFIG_METADESCRIPTION'>CONFIG_METADESCRIPTION</label>
                    {!! Form::text('CONFIG_METADESCRIPTION', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif                </div>
                <div class='input-field col-md-4'>
                    <label for='CONFIG_METAKEYWORDS'>CONFIG_METAKEYWORDS</label>
                    {!! Form::text('CONFIG_METAKEYWORDS', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-4'>
                    <label for='CONFIG_URLTERMODEUSO'>CONFIG_URLTERMODEUSO</label>
                    {!! Form::text('CONFIG_URLTERMODEUSO', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>
            </div>
            <div class='row manager'>
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
            <div class='row manager'>
                <div class='input-field col-md-12'>
                    <label for='CONFIG_CODGOOGLE'>CÓDIGO GOOGLE</label>
                    <textarea name='CONFIG_CODGOOGLE' id='CONFIG_CODGOOGLE' class='form-control'>
                    </textarea>
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>
            </div>
            <div class='row manager'>
                <div class='input-field col-md-6'>
                    <label for='CONFIG_EJORNAL_API'>CHAVE FORNECIDA PELA BEMFUNCIONAL</label>
                    {!! Form::text('CONFIG_EJORNAL_API', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-6'>
                    <label for='CONFIG_EJORNAL_SENHA'>SENHA FORNECIDA PELA BEMFUNCIONAL</label>
                    {!! Form::text('CONFIG_EJORNAL_SENHA', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>
            </div>
            
            <div class='modal-footer'>
                <button type='reset' class='btn btn-default waves-effect'>Resetar</button>
                <button type='submit' class='btn btn-primary waves-effect waves-light'>Salvar Dados</button>
            </div>
            {!! Form::close() !!}
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