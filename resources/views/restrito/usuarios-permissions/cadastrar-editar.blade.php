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

        @if(isset($data->id))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->id", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='input-field col-md-3'>
                <label>NOME</label>
                {!! Form::text('name', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('name'))
                <span class='text-danger'> {{ $errors->first('name') }} </span>
                @endif
            </div>
            <div class='input-field col-md-9'>
                <label>DESCRIÇÃO</label>
                {!! Form::text('label', null, ['maxlength' => '200', 'class' => 'form-control']) !!}
                @if ($errors->has('label'))
                <span class='text-danger'> {{ $errors->first('label') }} </span>
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