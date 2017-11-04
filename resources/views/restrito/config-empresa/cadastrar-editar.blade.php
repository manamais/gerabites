@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>






<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->EMPR_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->EMPR_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif
        <div class='row'>
            <div class='input-field col-md-5'>
                <label>NOME FANTASIA</label>
                {!! Form::text('EMPR_NOMEFANTASIA', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '200', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_NOMEFANTASIA'))
                <span class='text-danger'> {{ $errors->first('EMPR_NOMEFANTASIA') }} </span>
                @endif
            </div>
            <div class='input-field col-md-5'>
                <label>RAZÃO SOCIAL</label>
                {!! Form::text('EMPR_RAZAOSOCIAL', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '200', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_RAZAOSOCIAL'))
                <span class='text-danger'> {{ $errors->first('EMPR_RAZAOSOCIAL') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>INSC. MUNICIPAL</label>
                {!! Form::text('EMPR_INSCRICAOMUNICIPAL', null, ['maxlength' => '20', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_INSCRICAOMUNICIPAL'))
                <span class='text-danger'> {{ $errors->first('EMPR_INSCRICAOMUNICIPAL') }} </span>
                @endif
            </div>
        </div>

        <div class='row m-t-20'>
            <div class='input-field col-md-3'>
                <label>INSC. ESTADUAL</label>
                {!! Form::text('EMPR_INSCRICAOESTADUAL', null, ['maxlength' => '20', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_INSCRICAOESTADUAL'))
                <span class='text-danger'> {{ $errors->first('EMPR_INSCRICAOESTADUAL') }} </span>
                @endif
            </div>
            <div class='input-field col-md-3'>
                <label>CNPJ</label>
                {!! Form::text('EMPR_CNPJ', null, ['data-mask' => '00.000.000/0000-00', 'required' => 'yes', 'data-mask' => '99.999.999/9999-99', 'maxlength' => '18', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_CNPJ'))
                <span class='text-danger'> {{ $errors->first('EMPR_CNPJ') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>FONE</label>
                {!! Form::text('EMPR_FONE1', null, ['data-mask' => '(99)9999-9999', 'maxlength' => '14', 'class' => 'form-control' ]) !!}
                @if ($errors->has('EMPR_FONE1'))
                <span class='text-danger'> {{ $errors->first('EMPR_FONE1') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>CELULAR</label>
                {!! Form::text('EMPR_FONE2', null, ['data-mask' => '(99)99999-9999', 'maxlength' => '14', 'class' => 'form-control' ]) !!}
                @if ($errors->has('EMPR_FONE2'))
                <span class='text-danger'> {{ $errors->first('EMPR_FONE2') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>CEP</label>
                {!! Form::text('EMPR_CEP', null, ['required' => 'yes', 'data-mask' => '99999-999', 'minlength' => '10', 'maxlength' => '10', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_CEP'))
                <span class='text-danger'> {{ $errors->first('EMPR_CEP') }} </span>
                @endif
            </div>
        </div>
        <div class='row m-t-20'>
            <div class='input-field col-md-6'>
                <label>ENDEREÇO</label>
                {!! Form::text('EMPR_ENDERECO', null, ['required' => 'yes', 'maxlength' => '200', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_ENDERECO'))
                <span class='text-danger'> {{ $errors->first('EMPR_ENDERECO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-5'>
                <label>CIDADE</label>
                {!! Form::text('EMPR_CIDADE', null, ['required' => 'yes', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_CIDADE'))
                <span class='text-danger'> {{ $errors->first('EMPR_CIDADE') }} </span>
                @endif
            </div>
            <div class='input-field col-md-1'>
                <label>UF</label>
                {!! Form::text('EMPR_UF', null, ['required' => 'yes', 'minlength' => '2', 'maxlength' => '2', 'class' => 'form-control']) !!}
                @if ($errors->has('EMPR_UF'))
                <span class='text-danger'> {{ $errors->first('EMPR_UF') }} </span>
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
<script src="{{url('assets/restrito/js/input-mask.min.js')}}"></script>
@endpush

@endsection
