@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/posts')}}'>Postagens</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            @if(isset($data->VID_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->VID_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif
            <div class='row'>
                <div class='input-field col-md-6'>
                    <label>TÍTULO</label>
                    {!! Form::text('VID_TITULO', null, ['required' => 'yes', 'maxlength' => '250', 'class' => 'form-control']) !!}
                    @if ($errors->has('VID_TITULO'))
                    <span class='text-danger'> {{ $errors->first('VID_TITULO') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-6'>
                    <label>URL (Youtube e Vimeo)
                        <a data-toggle='tooltip' data-placement='right' title='' 
                           data-original-title='Adicione somente o link da barra de endereço. É necessário adicionar o "http://" '>
                            <i class='fa fa-exclamation-circle'></i>
                        </a>
                    </label>
                    {!! Form::url('VID_URL', null, ['required' => 'yes', 'maxlength' => '256', 'class' => 'form-control']) !!}
                    @if ($errors->has('VID_URL'))
                    <span class='text-danger'> {{ $errors->first('VID_URL') }} </span>
                    @endif
                </div>
            </div>
            <div class='row manager'>
                <div class='input-field col-md-12'>
                    <label>DESCRIÇÃO</label>
                    {!! Form::textarea('VID_DESCRICAO', null, ['id'=>'summernote','class' => 'summernote form-control' ]) !!}
                    @if ($errors->has('VID_DESCRICAO'))
                    <span class='text-danger'> {{ $errors->first('VID_DESCRICAO') }} </span>
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
<script src='{{url('/assets/restrict/js/plugins/summernote_paginas.js')}}'></script>
@endpush

@endsection


