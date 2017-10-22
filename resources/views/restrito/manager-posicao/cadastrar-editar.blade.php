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
            @if(isset($data->POS_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->POS_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif

            <div class='row'>
                <div class='input-field col-md-6'>
                    <label for='POS_DESCRICAO'>DESCRIÇÃO</label>
                    {!! Form::text('POS_DESCRICAO', null, ['required' => 'yes', 'maxlength' => '60', 'class' => 'form-control']) !!}
                    @if ($errors->has('POS_DESCRICAO'))
                    <span class='text-danger'> {{ $errors->first('POS_DESCRICAO') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-6'>
                    <label for='POS_IMAGEM'>IMAGEM</label>
                    {!! Form::file('POS_IMAGEM', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('POS_IMAGEM'))
                    <span class='text-danger'> {{ $errors->first('POS_IMAGEM') }} </span>
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
<script src='{{url('/assets/restrict/js/plugins/jscolor.min.js')}}'></script>
@endpush

@endsection