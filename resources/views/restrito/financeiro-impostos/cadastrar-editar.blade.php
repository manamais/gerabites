@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/impostos')}}'>impostos</a></li>
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
            <div class='input-field col-md-2'>
                <label>SIGLA</label>
                {!! Form::text('IMP_NOME', null, ['required' => 'yes', 'min' => '2', 'maxlength' => '15', 'class' => 'form-control']) !!}
                @if ($errors->has('IMP_NOME'))
                <span class='text-danger'> {{ $errors->first('IMP_NOME') }} </span>
                @endif
            </div>
            <div class='input-field col-md-8'>
                <label>DESCRIÇÃO</label>
                {!! Form::text('IMP_DESCRICAO', null, ['required' => 'yes', 'min' => '2', 'maxlength' => '80', 'class' => 'form-control']) !!}
                @if ($errors->has('IMP_DESCRICAO'))
                <span class='text-danger'> {{ $errors->first('IMP_DESCRICAO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>TAXA %</label>
                {!! Form::number('IMP_TAXA', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('IMP_TAXA'))
                <span class='text-danger'> {{ $errors->first('IMP_TAXA') }} </span>
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