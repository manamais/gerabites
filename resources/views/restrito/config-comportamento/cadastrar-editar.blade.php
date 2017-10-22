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
                    <label for='CONFIG_METODOURL'>EXIBIÇÃO URL</label>
                    {{ Form::select('CONFIG_METODOURL', [
                                '1' => '(dominio.com)/categoria/titulo-do-artigo',
                                '2' => '(dominio.com)/categoria/subcategoria/titulo-do-artigo',
                                '3' => '(dominio.com)/2017-01-01/titulo-do-artigo',
                                '4' => '(dominio.com)/codigo(1234)/titulo-do-artigo',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('CONFIG_METODOURL'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_METODOURL') }} </span>
                    @endif
                </div>

                <div class='input-field col-md-2'>
                    <label for='CONFIG_VOTARSEMREGISTRO'>VOTO S/REGISTRO?</label>
                    {{ Form::select('CONFIG_VOTARSEMREGISTRO', [
                                'SIM' => 'SIM',
                                'NÃO' => 'NÃO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('CONFIG_VOTARSEMREGISTRO'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_VOTARSEMREGISTRO') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='CONFIG_AUTOAPROVACAO'>AUTOAPROVAÇÃO?</label>
                    {{ Form::select('CONFIG_AUTOAPROVACAO', [
                                'SIM' => 'SIM',
                                'NÃO' => 'NÃO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('CONFIG_AUTOAPROVACAO'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_AUTOAPROVACAO') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='CONFIG_AUTOLISTAGEM'>AUTOLISTAGEM?</label>
                    {{ Form::select('CONFIG_AUTOLISTAGEM', [
                                'SIM' => 'SIM',
                                'NÃO' => 'NÃO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('CONFIG_AUTOAPROVACAO'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_AUTOLISTAGEM') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='CONFIG_AUTOCARREGAMENTO'>AUTOCARREGAMENTO?</label>
                    {{ Form::select('CONFIG_AUTOCARREGAMENTO', [
                                'SIM' => 'SIM',
                                'NÃO' => 'NÃO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('CONFIG_AUTOCARREGAMENTO'))
                    <span class='text-danger'> {{ $errors->first('CONFIG_AUTOCARREGAMENTO') }} </span>
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