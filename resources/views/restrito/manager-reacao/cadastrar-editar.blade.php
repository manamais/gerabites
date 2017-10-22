@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/categorias')}}'>Classificação</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            @if(isset($data->REA_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->REA_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif
            <div class='row'>
                <div class='input-field col-md-8'>
                    <label>TÍTULO</label>
                    {!! Form::text('REA_SLUG', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '50', 'class' => 'form-control']) !!}
                    @if ($errors->has('REA_SLUG'))
                    <span class='text-danger'> {{ $errors->first('REA_SLUG') }} </span>
                    @endif
                </div>
                <div class='col-md-4'>
                    <label>STATUS</label>
                    {{ Form::select('REA_STATUS', [
                                'ATIVO' => 'ATIVO',
                                'INATIVO' => 'INATIVO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('REA_STATUS'))
                    <span class='color-danger'> {{ $errors->first('REA_STATUS') }} </span>
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