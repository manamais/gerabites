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
            @if(isset($data->POST_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->POST_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif

            <div class='row'>
                <div class='input-field col-md-4'>
                    <label>LOCALIZAÇÃO</label>
                    <select name='POS_CODIGO' class="form-control" required>
                        @foreach($posicoes as $posicao)
                        <option
                            @if(isset($data->POS_CODIGO) && ($data->POS_CODIGO==$posicao->POS_CODIGO)) @php echo 'selected'; @endphp @endif
                            value="{{$posicao->POS_CODIGO}}" >{{$posicao->POS_DESCRICAO}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('POS_CODIGO'))
                <span class='text-danger'> {{ $errors->first('POS_CODIGO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>SUBCATEGORIA</label>
                <select name='SUBCAT_CODIGO' class="form-control" required>
                    @foreach($subcategorias as $subcategoria)
                    <option
                        @if(isset($data->SUBCAT_CODIGO) && ($data->SUBCAT_CODIGO==$subcategoria->SUBCAT_CODIGO)) @php echo 'selected'; @endphp @endif
                        value="{{$subcategoria->SUBCAT_CODIGO}}" >
                        {{$subcategoria->CAT_TITULO}} - {{$subcategoria->SUBCAT_TITULO}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('POS_CODIGO'))
            <span class='text-danger'> {{ $errors->first('POS_CODIGO') }} </span>
            @endif
        </div>
        <div class='input-field col-md-4'>
            <label>RETRANCA</label>
            {!! Form::text('POST_RETRANCA', null, ['maxlength' => '60', 'class' => 'form-control']) !!}
            @if ($errors->has('POST_RETRANCA'))
            <span class='text-danger'> {{ $errors->first('POST_RETRANCA') }} </span>
            @endif
        </div>
    </div>
    <div class='row manager'>
        <div class='input-field col-md-12'>
            <label>TITULO</label>
            {!! Form::text('POST_TITULO', null, ['required' => 'yes', 'maxlength' => '180', 'class' => 'form-control']) !!}
            @if ($errors->has('POST_TITULO'))
            <span class='text-danger'> {{ $errors->first('POST_TITULO') }} </span>
            @endif
        </div>
    </div>
    <div class='row manager'>
        <div class='input-field col-md-12'>
            <label>SUBTITULO/DESCRIÇÃO</label>
            {!! Form::text('POST_SUBTITULO', null, ['required' => 'yes', 'maxlength' => '256', 'class' => 'form-control']) !!}
            @if ($errors->has('POST_SUBTITULO'))
            <span class='text-danger'> {{ $errors->first('POST_SUBTITULO') }} </span>
            @endif
        </div>
    </div>
    <div class='row manager'>
        <div class='input-field col-md-12'>
            <label>DESCRIÇÃO</label>
            {!! Form::textarea('POST_TEXTO', null, ['id'=>'summernote','class' => 'summernote form-control' ]) !!}
            @if ($errors->has('POST_TEXTO'))
            <span class='text-danger'> {{ $errors->first('POST_TEXTO') }} </span>
            @endif
        </div>
    </div>
    <div class='row manager'>
        <div class='input-field col-md-5'>
            <label>IMAGEM (.jpg .png .gif .bmp)</label>
            {!! Form::file('POST_IMAGE', null, ['required' => 'yes', 'class' => 'form-control']) !!}
            @if ($errors->has('POST_IMAGE'))
            <span class='text-danger'> {{ $errors->first('POST_IMAGE') }} </span>
            @endif
        </div>
        <div class='input-field col-md-2'>
            <label>CRÉDITO</label>
            {!! Form::text('POST_IMAGE_CREDITO', null, ['maxlength' => '256', 'class' => 'form-control']) !!}
            @if ($errors->has('POST_IMAGE_CREDITO'))
            <span class='text-danger'> {{ $errors->first('POST_IMAGE_CREDITO') }} </span>
            @endif
        </div>
        <div class='input-field col-md-5'>
            <label>LEGENDA</label>
            {!! Form::text('POST_IMAGE_LEGENDA', null, ['maxlength' => '256', 'class' => 'form-control']) !!}
            @if ($errors->has('POST_IMAGE_LEGENDA'))
            <span class='text-danger'> {{ $errors->first('POST_IMAGE_LEGENDA') }} </span>
            @endif
        </div>
    </div>
    <div class='row manager'>
        <div class='input-field col-md-5'>
            <label>TAGS</label>
            {!! Form::text('POST_TAGS', null, ['required' => 'yes', 'mailength' => '10', 'maxlength' => '250', 'class' => 'form-control']) !!}
            @if ($errors->has('POST_TAGS'))
            <span class='text-danger'> {{ $errors->first('POST_TAGS') }} </span>
            @endif
        </div>
        <div class='col-md-2'>
            <label>STATUS</label>
            {{ Form::select('POST_STATUS', [
                                'ATIVO' => 'ATIVO',
                                'STANDBY' => 'STANDBY',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
            }}
            @if ($errors->has('POST_STATUS'))
            <span class='color-danger'> {{ $errors->first('POST_STATUS') }} </span>
            @endif
        </div>
        <div class='col-md-2'>
            <label>RESTRITO?</label>
            {{ Form::select('POST_RESSTRITAAOSUSUARIOS', [
                                'NÃO' => 'NÃO',
                                'SIM' => 'SIM',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
            }}
            @if ($errors->has('POST_RESSTRITAAOSUSUARIOS'))
            <span class='color-danger'> {{ $errors->first('POST_RESSTRITAAOSUSUARIOS') }} </span>
            @endif
        </div>
        <div class='input-field col-md-3'>
            <label>INÍCIO</label>
            {!! Form::date('POST_DTINICIO', null, ['class' => 'form-control']) !!}
            @if ($errors->has('POST_DTINICIO'))
            <span class='text-danger'> {{ $errors->first('POST_DTINICIO') }} </span>
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