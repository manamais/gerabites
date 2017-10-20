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
            @if(isset($data->EMPR_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->EMPR_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif
            <div class='row'>
                <div class='input-field col-md-3'>
                    <label for='EMPR_NOMEFANTASIA'>NOME FANTASIA</label>
                    {!! Form::text('EMPR_NOMEFANTASIA', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '200', 'style' => 'text-transform: uppercase', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-3'>
                    <label for='EMPR_RAZAOSOCIAL'>RAZÃO SOCIAL</label>
                    {!! Form::text('EMPR_RAZAOSOCIAL', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '200', 'style' => 'text-transform: uppercase', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='EMPR_INSCRICAOMUNICIPAL'>INSC. MUNICIPAL</label>
                    {!! Form::text('EMPR_INSCRICAOMUNICIPAL', null, ['maxlength' => '20', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='EMPR_INSCRICAOESTADUAL'>INSC. ESTADUAL</label>
                    {!! Form::text('EMPR_INSCRICAOESTADUAL', null, ['maxlength' => '20', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='EMPR_CNPJ'>CNPJ</label>
                    {!! Form::text('EMPR_CNPJ', null, ['required' => 'yes', 'data-mask' => '99.999.999/9999-99', 'maxlength' => '18', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
            </div>

            <div class='row manager'>
                <div class='input-field col-md-4'>
                    <label for='EMPR_ENDERECO'>ENDEREÇO</label>
                    {!! Form::text('EMPR_ENDERECO', null, ['required' => 'yes', 'maxlength' => '200', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-3'>
                    <label for='EMPR_CIDADE'>CIDADE</label>
                    {!! Form::text('EMPR_CIDADE', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-1'>
                    <label for='EMPR_UF'>UF</label>
                    {!! Form::text('EMPR_UF', null, ['required' => 'yes', 'minlength' => '2', 'maxlength' => '2', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='EMPR_CEP'>CEP</label>
                    {!! Form::text('EMPR_CEP', null, ['required' => 'yes', 'data-mask' => '99.999-999', 'minlength' => '10', 'maxlength' => '10', 'class' => 'form-control']) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='EMPR_FONE'>FONE</label>
                    {!! Form::text('EMPR_FONE', null, ['data-mask' => '(99)99999-9999', 'maxlength' => '14', 'class' => 'form-control' ]) !!}
                    @if ($errors->has('EMPR_NOME'))
                    <span class='text-danger'> {{ $errors->first('EMPR_NOME') }} </span>
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
@if (session('status'))
@endif
@endpush

@endsection