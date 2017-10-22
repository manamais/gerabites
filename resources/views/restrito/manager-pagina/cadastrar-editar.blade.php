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
            @if(isset($data->PAG_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->PAG_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif

            <div class='row'>
                <div class='input-field col-md-8'>
                    <label for='PAG_TITULO'>TÍTULO</label>
                    {!! Form::text('PAG_TITULO', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '50', 'class' => 'form-control']) !!}
                    @if ($errors->has('PAG_TITULO'))
                    <span class='text-danger'> {{ $errors->first('PAG_TITULO') }} </span>
                    @endif
                </div>
                <div class='col-md-2'>
                    <label>LINK TOPO</label>
                    {{ Form::select('PAG_LINKTOPO', [
                                'S' => 'SIM',
                                'N' => 'NÃO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('PAG_LINKTOPO'))
                    <span class='color-danger'> {{ $errors->first('PAG_LINKTOPO') }} </span>
                    @endif
                </div>
                <div class='col-md-2'>
                    <label>LINK RODAPÉ</label>
                    {{ Form::select('PAG_LINKRODAPE', [
                                'S' => 'SIM',
                                'N' => 'NÃO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('PAG_LINKRODAPE'))
                    <span class='color-danger'> {{ $errors->first('PAG_LINKRODAPE') }} </span>
                    @endif
                </div>
            </div>
            <div class='row manager'>
                <div class='input-field col-md-12'>
                    <label for='PAG_DESCRICAO'>DESCRIÇÃO</label>
                    {!! Form::textarea('PAG_DESCRICAO', null, ['id'=>'summernote','class' => 'summernote form-control' ]) !!}
                    @if ($errors->has('PAG_DESCRICAO'))
                    <span class='text-danger'> {{ $errors->first('PAG_DESCRICAO') }} </span>
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